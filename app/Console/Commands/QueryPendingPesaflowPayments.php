<?php

namespace App\Console\Commands;

use App\Actions\Pesaflow\PesaflowQueryPaymentStatus;
use App\Enum\PurchaseOrderStatus;
use App\Models\PurchaseOrder;
use Illuminate\Console\Command;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Log;

class QueryPendingPesaflowPayments extends Command
{
    protected $signature = 'purchases:query-pending-pesaflow-payments';

    protected $description = 'Query Pesaflow payment status for pending purchase orders';

    public function handle(): int
    {
        $queried = 0;
        $failed = 0;

        PurchaseOrder::query()
            ->where('status', PurchaseOrderStatus::NEW->value)
            ->whereHas('pesaflow_request', fn($query) => $query->whereNotNull('invoice_number'))
            ->with('pesaflow_request')
            ->chunkById(200, function ($orders) use (&$queried, &$failed) {
                foreach ($orders as $order) {
                    try {
                        PesaflowQueryPaymentStatus::run($order->pesaflow_request->invoice_number);
                        $queried++;
                    } catch (RequestException $exception) {
                        $failed++;

                        Log::error('Failed to query Pesaflow payment status for purchase order.', [
                            'purchase_order_id' => $order->id,
                            'invoice_number' => $order->pesaflow_request->invoice_number,
                            'exception' => $exception->getMessage(),
                        ]);
                    }
                }
            });

        $this->info("Queried {$queried} pending Pesaflow payments; {$failed} queries failed.");

        return $failed === 0 ? self::SUCCESS : self::FAILURE;
    }
}
