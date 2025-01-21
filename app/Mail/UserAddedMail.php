<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserAddedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user; // Ensure this is public

    /**
     * Create a new message instance.
     */
    public function __construct($user)
    {
        $this->user = $user; // Assign the $user parameter to the $user property
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this
            ->subject('Welcome to Our Platform')
            ->view('emails.user-added')
            ->with('user', $this->user); // Pass the $user property to the view
    }
}
