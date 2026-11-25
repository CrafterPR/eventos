<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class DelegateCertificateMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $delegateName,
        public string $delegateId
    ) {}

    public function build(): self
    {
        $path = "certificates/{$this->delegateId}.pdf";

        if (!Storage::disk('public')->exists($path)) {
            throw new \RuntimeException("Certificate file is missing for delegate {$this->delegateId}.");
        }

        return $this->subject('Your certificate')
            ->view('emails.delegate-certificate')
            ->attachFromStorageDisk(
                'public',
                $path,
                'certificate.pdf',
                ['mime' => 'application/pdf']
            );
    }
}
