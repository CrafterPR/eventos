<?php

namespace App\Http\Livewire\Events;

use Livewire\Component;
use App\Models\PurchaseOrder;
use App\Enum\PurchaseOrderStatus;

class PurchaseOrdersDoughnut extends Component
{
    public int $paid = 0;
    public int $notPaid = 0;

    protected $listeners = ['purchaseOrdersUpdated' => 'refreshCounts'];

    public function mount(): void
    {
        $this->refreshCounts();
    }

    public function refreshCounts(): void
    {
        $this->paid = PurchaseOrder::where('status', PurchaseOrderStatus::PAID->value)->count();
        $this->notPaid = PurchaseOrder::where('status', PurchaseOrderStatus::NEW->value)->count();
    }

    public function render()
    {
        $data = [
            ['category' => 'Paid', 'total' => $this->paid],
            ['category' => 'Not Paid', 'total' => $this->notPaid],
        ];

        return view('livewire.events.purchase-orders-doughnut', [
            'data' => $data,
            'paid' => $this->paid,
            'notPaid' => $this->notPaid,
        ]);
    }
}
