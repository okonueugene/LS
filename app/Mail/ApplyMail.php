<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ApplyMail extends Mailable
{
    use Queueable;
    use SerializesModels;
    public $mailData;
    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct()
    {
    }
    
     public function build()
     {
        return $this->view('emails.applyMail');
     }

   
}
