<?php

namespace App\Mail;

use App\Models\Sponsorship;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SponsorshipRegistrationMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(
        public Sponsorship $sponsorship,
        public ?string $password,
        public ?string $paymentLink
    ) {
        $this->afterCommit();
    }

    public function build(): static
    {
        return $this->subject('Sponsorship application and payment details')
            ->view('emails.sponsorship-registration');
    }
}
