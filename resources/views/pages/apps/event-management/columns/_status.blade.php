
@php $status = is_string($row->status) ? $row->status : ( $row->status instanceof \BackedEnum ? $row->status->value : (string)$row->status ); @endphp
@if($status === \App\Enum\PurchaseOrderStatus::PAID->value)
    <span class="badge bg-success">PAID</span>
@elseif($status === \App\Enum\PurchaseOrderStatus::NEW->value)
    <span class="badge bg-warning">PENDING</span>
@else
    <span class="badge bg-secondary">{{ Str::upper($status) }}</span>
@endif
