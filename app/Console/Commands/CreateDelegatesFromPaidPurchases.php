<?php

namespace App\Console\Commands;

use App\Actions\CreateDelegatesFromPurchaseOrder;
use App\Enum\PurchaseOrderStatus;
use App\Models\PurchaseOrder;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CreateDelegatesFromPaidPurchases extends Command
{
    protected $signature = 'purchases:create-delegates-from-paid';

    protected $description = 'Create missing delegates for already paid purchase orders';

    public function handle(): int
    {
        $ordersProcessed = 0;
        $delegatesCreated = 0;
        $failed = 0;

        PurchaseOrder::query()
            ->where('status', PurchaseOrderStatus::PAID->value)
            ->with('user')
            ->chunkById(200, function ($orders) use (&$ordersProcessed, &$delegatesCreated, &$failed) {
                foreach ($orders as $order) {
                    $ordersProcessed++;

                    try {
                        $delegatesCreated += CreateDelegatesFromPurchaseOrder::run($order);
                    } catch (\Throwable $exception) {
                        $failed++;

                        Log::error('Failed to create delegates for paid purchase order.', [
                            'purchase_order_id' => $order->id,
                            'exception' => $exception,
                        ]);
                    }
                }
            });

        $this->info("Processed {$ordersProcessed} paid purchase orders; created {$delegatesCreated} delegates; {$failed} orders failed.");

        return $failed === 0 ? self::SUCCESS : self::FAILURE;
    }
}
