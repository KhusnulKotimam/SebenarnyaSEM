<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PublicUser;
use App\Models\Inquiry;

class PublicUserController extends Controller
{
    public function showProfile($user_id)
    {
        $this->authorizeUser($user_id);

        $user = auth()->user();

        return view('PublicUser.profile', compact('user'));
    }

    public function updateProfile(Request $request, $user_id)
    {
        $this->authorizeUser($user_id);

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = auth()->user();
        $user->name = $request->name;

        if ($user->publicUser) {
            $user->publicUser->name = $request->name;
            $user->publicUser->phone = $request->phone;
            $user->publicUser->save();
        }

        if ($request->hasFile('profile_picture')) {
            $filename = time() . '.' . $request->profile_picture->extension();
            $request->profile_picture->storeAs('profile_pictures', $filename, 'public');
            $user->profile_picture = 'profile_pictures/' . $filename;
        }

        $user->save();

        return back()->with('success', 'Profile updated successfully.');
    }

    public function changePassword(Request $request, $user_id)
    {
        $this->authorizeUser($user_id);

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = auth()->user();

        if (!$user->updatePassword($request->current_password, $request->new_password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        return back()->with('success', 'Password updated successfully.');
    }

    private function authorizeUser($user_id)
    {
        if (auth()->id() != $user_id || !auth()->user()->isPublicUser()) {
            abort(403, 'Unauthorized action.');
        }
    }

    public function storeInquiry(Request $request, $user_id)
    {
        $this->authorizeUser($user_id);

        $attachmentPath = null;

        if ($request->hasFile('proof')) {
            $file = $request->file('proof');

            if ($file->isValid()) {
                $attachmentPath = $file->store('attachments', 'public');
            }
        }

        $user = auth()->user();

        $publicUser = PublicUser::where('user_id', $user->id)->first();

        if (! $publicUser) {
            abort(404, 'Public user not found.');
        }

        Inquiry::create([
            'PublicUser_id' => $publicUser->id,
            'NewsTitle' => $request->title ?? '',
            'NewsContent' => $request->content ?? '',
            'NewsSource' => $request->source ?? '',
            'InquiryDate' => now()->toDateString(),
            'InquiryStatus' => 'Pending',
            'attachment' => $attachmentPath,
        ]);

        return redirect()
            ->route('PublicUser.InquiryHistory', ['user_id' => $user_id])
            ->with('success', 'Inquiry submitted successfully!');
    }

    public function inquiryHistory($user_id)
    {
        $user = auth()->user();

        if (!$user || $user->id != $user_id) {
            abort(403, 'Unauthorized action.');
        }

        $publicUser = PublicUser::where('user_id', $user_id)->first();

        if (!$publicUser) {
            abort(404, 'Public user not found.');
        }

        $inquiries = Inquiry::with(['agency', 'assignment'])
            ->where('PublicUser_id', $publicUser->id)
            ->orderBy('InquiryDate', 'desc')
            ->get();

        return view('PublicUser.InquiryHistory', [
            'inquiries' => $inquiries,
            'user' => $user,
            'publicUser' => $publicUser,
        ]);
    }

    public function viewInquiry($user_id, $inquiry_id)
    {
        $inquiry = Inquiry::findByUser($inquiry_id, $user_id);

        if (!$inquiry) {
            abort(404, 'Inquiry not found.');
        }

        return view('PublicUser.InquiryDetail', compact('inquiry'));
    }

    public function dashboard($user_id)
    {
        $user = auth()->user();

        if (!$user || $user->id != $user_id || !$user->isPublicUser()) {
            abort(403, 'Unauthorized action.');
        }

        $publicUser = PublicUser::where('user_id', $user->id)->first();

        if (!$publicUser) {
            abort(404, 'Public user not found.');
        }

        $total = Inquiry::where('PublicUser_id', $publicUser->id)->count();

        $pending = Inquiry::where('PublicUser_id', $publicUser->id)
            ->where('InquiryStatus', 'Pending')
            ->count();

        $inProgress = Inquiry::where('PublicUser_id', $publicUser->id)
            ->where('InquiryStatus', 'In Progress')
            ->count();

        $resolved = Inquiry::where('PublicUser_id', $publicUser->id)
            ->where('InquiryStatus', 'Resolved')
            ->count();

        $recent = Inquiry::where('PublicUser_id', $publicUser->id)
            ->latest()
            ->take(5)
            ->get();

        return view('PublicUser.dashboard', compact('total', 'pending', 'inProgress', 'resolved', 'recent'));
    }

    public function publicInquiry($user_id)
    {
        if (auth()->id() != $user_id || !auth()->user()->isPublicUser()) {
            abort(403, 'Unauthorized');
        }

        $inquiries = Inquiry::where('InquiryStatus', 'Resolved')
            ->whereHas('progress', function ($query) {
                $query->whereIn('ProgressStatus', ['Verified as True', 'Identified as Fake']);
            })
            ->with(['progress' => function ($query) {
                $query->latest()->limit(1);
            }])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('PublicUser.PublicInquiry', compact('inquiries'));
    }

    public function inquiryProgress(Request $request)
    {
        $user = auth()->user();

        $publicUser = PublicUser::where('user_id', $user->id)->firstOrFail();

        $query = Inquiry::with(['progressUpdates', 'agency.user'])
            ->where('PublicUser_id', $publicUser->id);

        if ($request->filled('search')) {
            $query->where('NewsTitle', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('status')) {
            $query->where('InquiryStatus', $request->status);
        }

        $inquiries = $query->orderBy('created_at', 'desc')->get();

        return view('PublicUser.InquiryProgress', compact('inquiries'));
    }
}