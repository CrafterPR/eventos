<?php

namespace App\Console\Commands;

use App\Actions\GenerateCertificate;
use App\Mail\DelegateCertificateMail;
use App\Models\Delegate;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class GenerateCertificates extends Command
{
    protected $signature = 'certificates:generate {--resend : Queue emails for already generated certificates without regenerating them}';

    protected $description = 'Generate certificates for all delegates';

    public function handle(GenerateCertificate $generateCertificate): int
    {
        $delegatesProcessed = 0;
        $certificatesGenerated = 0;
        $emailsQueued = 0;
        $skipped = 0;
        $failed = 0;

        $delegates = Delegate::query();

        if (!$this->option('resend')) {
            $delegates->whereNull('certificate_generated_at');
        }

        $delegates->chunkById(100, function ($delegates) use (
            $generateCertificate,
            &$delegatesProcessed,
            &$certificatesGenerated,
            &$emailsQueued,
            &$skipped,
            &$failed
        ) {
            foreach ($delegates as $delegate) {
            $delegatesProcessed++;

            if (blank($delegate->certificate_generated_at)) {
                try {
                    $generateCertificate->asController($delegate);
                    $certificatesGenerated++;
                } catch (\Throwable $exception) {
                    $failed++;

                    $this->error("Failed to generate certificate for delegate {$delegate->id}: {$exception->getMessage()}");
                    continue;
                }
            }

            if (blank($delegate->email)) {
                $skipped++;
                Log::warning('Skipped certificate email because delegate has no email address.', [
                    'delegate_id' => $delegate->id,
                ]);
                continue;
            }

            try {
                $certificatePdf = Storage::disk('public')->get("certificates/{$delegate->id}.pdf");

                if (!is_string($certificatePdf) || $certificatePdf === '') {
                    throw new \RuntimeException("Generated certificate file is missing or empty for delegate {$delegate->id}.");
                }

                Mail::to($delegate->email)->queue(
                    new DelegateCertificateMail($delegate->name, $certificatePdf)
                );
                $emailsQueued++;
            } catch (\Throwable $exception) {
                $failed++;

                Log::error('Failed to queue delegate certificate email.', [
                    'delegate_id' => $delegate->id,
                    'email' => $delegate->email,
                    'exception' => $exception,
                ]);

                $this->error("Failed to queue certificate email for delegate {$delegate->id}: {$exception->getMessage()}");
            }
            }
        });

        $this->info("Processed {$delegatesProcessed} delegates; generated {$certificatesGenerated} certificates; queued {$emailsQueued} emails; skipped {$skipped} without an email address; {$failed} failed.");

        return $failed === 0 && $skipped === 0 ? self::SUCCESS : self::FAILURE;
    }
}
