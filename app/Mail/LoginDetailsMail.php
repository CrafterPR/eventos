<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class LoginDetailsMail extends Mailable
{
    use Queueable, SerializesModels;

    public User $user;
    public string $password;

    /**
     * Create a new message instance.
     */
    public function __construct(User $user, string $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Your account login details')
            ->view('emails.login-details')
            ->with([
                'user' => $this->user,
                'password' => $this->password,
            ]);
    }
}
