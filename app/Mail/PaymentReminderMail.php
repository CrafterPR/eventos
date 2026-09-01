<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    public string|null $name;
    public string $invoiceLink;
    public string $reference;

    public function __construct(?string $name, string $invoiceLink, string $reference)
    {
        $this->name = $name;
        $this->invoiceLink = $invoiceLink;
        $this->reference = $reference;
    }

    public function build()
    {
        return $this->subject("Payment reminder for purchase {$this->reference}")
            ->view('emails.payment_reminder')
            ->with([
                'name' => $this->name,
                'invoiceLink' => $this->invoiceLink,
                'reference' => $this->reference,
            ]);
    }
}
