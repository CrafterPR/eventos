<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DelegateCertificateMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $delegateName,
        public string $delegateId
    ) {}

    public function build(): self
    {
        return $this->subject('Your certificate')
            ->view('emails.delegate-certificate')
            ->attachFromStorageDisk(
                'public',
                "certificates/{$this->delegateId}.pdf",
                'certificate.pdf',
                ['mime' => 'application/pdf']
            );
    }
}
