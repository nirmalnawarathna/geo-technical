<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JobCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $job;
    public $fileUploadPaths;

    public function __construct($job, $fileUploadPaths)
    {
        $this->job = $job;
        $this->fileUploadPaths = $fileUploadPaths;
    }

    public function build()
    {
        return $this->view('emails.job_created')
                    ->with([
                        'job' => $this->job,
                        'fileUploadPaths' => $this->fileUploadPaths,
                    ])
                    ->subject('New Job Created');
    }
}
