@extends('layouts.dashboard')

@section('content')
<div class="py-12">
  <div class="bg-gradient-to-tr from-cyan-200 via-blue-300 to-emerald-300 rounded-3xl shadow-2xl p-10">

    <h2 class="text-3xl font-extrabold mb-8 text-gray-900 tracking-wide">Submit New Inquiry</h2>

    {{-- General validation notification --}}
    @if ($errors->any())
      <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg">
        <strong>Please complete the required fields.</strong>
        <ul class="mt-2 list-disc list-inside">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('PublicUser.storeInquiry', ['user_id' => Auth::id()]) }}" enctype="multipart/form-data">
      @csrf

      {{-- Title --}}
      <div class="mb-6">
        <label for="title" class="block text-gray-800 font-semibold mb-2">Title</label>
        <input
          type="text"
          id="title"
          name="title"
          value="{{ old('title') }}"
          class="w-full rounded-lg border px-4 py-3 focus:outline-none focus:ring-2 
          focus:ring-blue-500 focus:border-transparent transition
           {{ $errors->has('title') ? 'border-red-500' : 'border-gray-400' }}"
          placeholder="Enter inquiry title"
        >

        @error('title')
          <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
      </div>

      {{-- Content --}}
      <div class="mb-6">
        <label for="content" class="block text-gray-800 font-semibold mb-2">Content</label>
        <textarea
          id="content"
          name="content"
          rows="5"
          class="w-full rounded-lg border px-4 py-3 resize-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition {{ $errors->has('content') ? 'border-red-500' : 'border-gray-400' }}"
          placeholder="Write the details of your inquiry here..."
        >{{ old('content') }}</textarea>

        @error('content')
          <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
      </div>

      {{-- Source --}}
      <div class="mb-6">
        <label for="source" class="block text-gray-800 font-semibold mb-2">Source</label>
        <input
          type="text"
          id="source"
          name="source"
          value="{{ old('source') }}"
          class="w-full rounded-lg border px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition {{ $errors->has('source') ? 'border-red-500' : 'border-gray-400' }}"
          placeholder="Mention the source of your inquiry"
        >

        @error('source')
          <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
      </div>

      {{-- Proof Attachment --}}
      <div class="mb-8">
        <label for="proof" class="block text-gray-800 font-semibold mb-2">Proof (Attachment)</label>
        <input
          type="file"
          id="proof"
          name="proof"
          accept=".jpg,.jpeg,.png,.pdf,.doc,.docx"
          class="w-full text-gray-700"
        >

        <p class="mt-1 text-sm text-gray-600">
          Accepted formats: JPG, JPEG, PNG, PDF, DOC, DOCX. Maximum size: 2MB.
        </p>

        @error('proof')
          <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
      </div>

      <div class="flex justify-end">
        <button
          type="submit"
          class="bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 text-white font-semibold py-3 px-8 rounded-lg shadow-lg transition"
        >
          Submit Inquiry
        </button>
      </div>
    </form>
  </div>
</div>
@endsection