<?php

namespace App\Console\Commands;

use App\Enum\PurchaseOrderStatus;
use App\Mail\PaymentReminderMail;
use App\Models\PurchaseOrder;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendPendingPurchaseReminders extends Command
{
    protected $signature = 'purchases:send-pending-reminders';

    protected $description = 'Email payment reminders for pending purchase orders';

    public function handle(): int
    {
        $queued = 0;
        $skipped = 0;

        PurchaseOrder::query()
            ->where('status', PurchaseOrderStatus::NEW->value)
            ->with(['user', 'pesaflow_request'])
            ->chunkById(200, function ($orders) use (&$queued, &$skipped) {
                foreach ($orders as $order) {
                    $email = $order->payment_email ?? $order->user?->email;
                    $invoiceLink = $order->pesaflow_request?->invoice_link;

                    if (!$email || !$invoiceLink) {
                        $skipped++;
                        Log::warning('Skipped scheduled pending purchase reminder due to missing email or invoice link.', [
                            'purchase_order_id' => $order->id,
                        ]);
                        continue;
                    }

                    $name = $order->user
                        ? trim(($order->user->first_name ?? '') . ' ' . ($order->user->last_name ?? ''))
                        : null;

                    Mail::to($email)->queue(
                        new PaymentReminderMail($name ?: null, $invoiceLink, $order->reference)
                    );
                    $queued++;
                }
            });

        $this->info("Queued {$queued} pending purchase reminders; skipped {$skipped} orders.");

        return self::SUCCESS;
    }
}
