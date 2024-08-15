<?php

namespace App\Listeners;

use Illuminate\Http\Client\Events\RequestSending;
use Illuminate\Support\Facades\Log;

class LogRequestSending
{
    /**
     * Handle the event.
     */
    public function handle(RequestSending $event): void
    {
        if (app()->isLocal()) {
            Log::debug('HTTP PESAFLOW REQUEST', [
                'url' => $event->request->url(),
                'body' => json_decode($event->request->body()),
            ]);
        }
    }
}
