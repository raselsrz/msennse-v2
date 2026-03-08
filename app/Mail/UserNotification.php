<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $details; // Data for email content

    public function __construct($details)
    {
        $this->details = $details;
    }

    public function build()
    {
        return $this->from('australiapwc12@gmail.com')
                    ->subject('Mail from WPC Company')
                    ->view('welcome')
                    ->with('details', $this->details);
    }
}
