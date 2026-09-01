<?php

namespace App\Mail;

use App\Models\PurchaseOrder;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class LoginDetailsMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public  $user;
    public string $password;
    public ?PurchaseOrder $purchaseOrder = null;

    /**
     * Create a new message instance.
     */
    public function __construct($user, string $password, PurchaseOrder $purchaseOrder)
    {
        $this->user = User::find($user->id);
        $this->password = $password;
        $this->purchaseOrder = $purchaseOrder;
        $this->afterCommit();
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Registration successful!, Your 2nd KICP Access & Ticket details')
            ->view('emails.login-details')
            ->with([
                'user' => $this->user,
                'password' => $this->password,
                'order' => $this->purchaseOrder,
            ]);
    }
}
