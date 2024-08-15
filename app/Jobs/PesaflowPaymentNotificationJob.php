<?php

namespace App\Jobs;

use App\Actions\Pesaflow\ProcessWebhookCall;
use Spatie\WebhookClient\Jobs\ProcessWebhookJob;

class PesaflowPaymentNotificationJob extends ProcessWebhookJob
{
    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $webhookCall = $this->webhookCall;
        ProcessWebhookCall::run($webhookCall);
    }
}
