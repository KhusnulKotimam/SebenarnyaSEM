<?php

namespace App\Mail;

use App\Models\Progress;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InquiryProgressMail extends Mailable
{
    use Queueable, SerializesModels;

    public $progress;

    public $recipientType;

    public function __construct(Progress $progress, $recipientType = 'public')
    {
        $this->progress = $progress;
        $this->recipientType = $recipientType;
    }

    public function build()
    {
        $subject = $this->recipientType === 'mcmc'
            ? 'Agency Has Updated Inquiry Progress'
            : 'Your Inquiry Has Been Updated';

        return $this->subject($subject)
            ->view('emails.inquiry_progress')
            ->with([
                'recipientType' => $this->recipientType,
            ]);
    }
}
