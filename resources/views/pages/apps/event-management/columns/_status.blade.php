
@if($row->status === \App\Enum\PurchaseOrderStatus::PAID)
    <span class="badge bg-success">PAID</span>
@elseif($row->status === \App\Enum\PurchaseOrderStatus::NEW)
    <span class="badge bg-warning">PENDING</span>
@else
    <span class="badge bg-secondary">{{ Str::upper($row->status->value) }}</span>
@endif
