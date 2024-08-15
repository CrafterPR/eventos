<?php

namespace App\Jobs;

use App\Actions\Pesaflow\ProcessWebhookCall;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\WebhookClient\Models\WebhookCall;

class RetryWebhookJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public WebhookCall $webhookCall
    )
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        ProcessWebhookCall::run($this->webhookCall);
    }
}
