<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Jobs;
 

class JobUpdatedNotification extends Mailable
{
     use Queueable, SerializesModels;

    public $job;
    public $status;
    public $visitDate;
    public $reportEta;

    public function __construct(Jobs $job, $status, $visitDate, $reportEta)
    {
        $this->job = $job;
        $this->status = $status;
        $this->visitDate = $visitDate;
        $this->reportEta = $reportEta;
    }

    public function build()
    {
        return $this->markdown('emails.job_updated_notification')
                    ->subject('Job Updated Notification');
    }
}