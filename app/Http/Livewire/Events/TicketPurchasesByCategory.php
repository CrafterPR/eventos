<?php

namespace App\Http\Livewire\Events;

use Livewire\Component;
use App\Models\PurchaseOrder;
use App\Enum\PurchaseOrderStatus;

class TicketPurchasesByCategory extends Component
{
    // data will be an array of ['category' => string, 'paid' => int, 'unpaid' => int]
    public array $data = [];

    protected $listeners = ['purchaseOrdersUpdated' => 'refreshCounts'];

    public function mount(): void
    {
        $this->refreshCounts();
    }

    public function refreshCounts(): void
    {
        $countsPaid = [];
        $countsUnpaid = [];

        $purchaseOrders = PurchaseOrder::select('tickets', 'status')->get();

        foreach ($purchaseOrders as $po) {
            $tickets = $po->tickets;

            if (is_string($tickets)) {
                $decoded = json_decode($tickets, true);
                if (json_last_error() === JSON_ERROR_NONE) {
                    $tickets = $decoded;
                }
            }

            if (!is_array($tickets) && !$tickets instanceof \Illuminate\Support\Collection) {
                continue;
            }

            $isPaid = ($po->status == PurchaseOrderStatus::PAID->value);

            foreach ($tickets as $t) {
                if (!is_array($t)) {
                    continue;
                }

                $type = $t['type'] ?? ($t['title'] ?? 'Unknown');
                $qty = isset($t['count']) ? (int)$t['count'] : (isset($t['quantity']) ? (int)$t['quantity'] : 1);

                if ($type === null || $type === '') {
                    $type = 'Unknown';
                }

                if ($isPaid) {
                    $countsPaid[$type] = ($countsPaid[$type] ?? 0) + $qty;
                } else {
                    $countsUnpaid[$type] = ($countsUnpaid[$type] ?? 0) + $qty;
                }
            }
        }

        // Combine keys and sort by total count desc
        $combined = [];
        foreach (array_keys(array_merge($countsPaid, $countsUnpaid)) as $k) {
            $p = $countsPaid[$k] ?? 0;
            $u = $countsUnpaid[$k] ?? 0;
            $combined[$k] = $p + $u;
        }

        arsort($combined);

        $result = [];
        foreach ($combined as $category => $_) {
            $result[] = [
                'category' => $category,
                'paid' => $countsPaid[$category] ?? 0,
                'unpaid' => $countsUnpaid[$category] ?? 0,
            ];
        }

        $this->data = $result;
    }

    public function render()
    {
        return view('livewire.events.ticket-purchases-by-category', [
            'data' => $this->data,
        ]);
    }
}
