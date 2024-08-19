<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UpdateJobMail extends Mailable
{
    use Queueable, SerializesModels;

    public $job;
    public $status;
    public $visitDate;
    public $reportEta;

    /**
     * Create a new message instance.
     */
    public function __construct($job, $status, $visitDate, $reportEta)
    {
        $this->job = $job;
        $this->status = $status;
        $this->visitDate = $visitDate;
        $this->reportEta = $reportEta;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Update Job Status',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.JobUpdateEmail',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
