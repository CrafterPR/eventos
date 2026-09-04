@php use App\Actions\GeneratePaymentReceipt; @endphp
<x-default-layout>
    @section('title', 'Purchase Order')

    <div class="container py-8">
        <div class="card card-flush">
            <div class="card-header">
                <h3 class="card-title">Purchase Order Details</h3>
                <div class="card-toolbar ms-auto">
                    <a href="{{ route('tickets.index') }}" class="btn btn-sm btn-light">Purchase more</a>
                    <a href="{{ route('dashboard') }}" class="btn btn-sm btn-primary ms-2">Back to dashboard</a>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <h4 class="fw-bold">Reference: <span class="text-muted">{{ $order->reference }}</span></h4>
                    <p class="mb-0">Status: <strong>{{ ucfirst($order->status_value) }}</strong></p>
                    <p class="mb-0">Amount: <strong>{{ number_format($order->amount, 2) }} {{ $order->currency_value ?? 'KSH' }}</strong></p>
                    <p class="mb-0">Payment method: <strong>{{ strtoupper($order->payment_method ?? '') }}</strong></p>
                </div>

                <hr />

                <h5 class="mb-3">Tickets</h5>
                @if(is_array($order->tickets) || $order->tickets instanceof \Illuminate\Support\Collection)
                    <ul class="list-group mb-4">
                        @foreach($order->tickets as $ticket)
                            <li class="list-group-item">
                                @if(is_array($ticket) && isset($ticket['type']))
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <strong>{{ $ticket['type'] }}</strong>
                                            <div class="text-muted">Price: {{ $ticket['price'] ?? 'N/A' }} × {{ $ticket['count'] ?? ($ticket['quantity'] ?? 1) }}</div>
                                        </div>
                                        <div class="text-end">
                                            <span class="fw-bold">{{ number_format((($ticket['price'] ?? 0) * ($ticket['count'] ?? ($ticket['quantity'] ?? 1))), 2) }}</span>
                                        </div>
                                    </div>
                                @else
                                    {{ json_encode($ticket) }}
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted">{{ json_encode($order->tickets) }}</p>
                @endif

                <hr />

                <h5 class="mb-3">Delegate Information</h5>
                <p>Name: {{ $order->user?->first_name }} {{ $order->user?->last_name }}</p>
                <p>Email: {{ $order->user?->email }}</p>
                <p>Phone: {{ $order->payment_phone ?? $order->user?->mobile }}</p>
                <p>Organization: {{ $order->user?->organization ?? 'N/A' }}</p>

                <div class="mt-4">
                    @if($order->status_value == \App\Enum\PurchaseOrderStatus::PAID->value)
                        @if($order->payment_receipt == null)
                            @php
                                $receiptUrl = GeneratePaymentReceipt::run($order);
                                $order->update(['payment_receipt' => $receiptUrl]);
                            @endphp
                        @endif
                        <a href="{{ Storage::disk('public')->url($order->payment_receipt) }}" target="_blank" rel="noopener
                        noreferrer" class="btn btn-success">Print receipt</a>
                    @else
                        @if($order->status_value !== \App\Enum\PurchaseOrderStatus::PAID->value)
                            @php
                                $payLink = \App\Models\Pesaflow\PesaflowRequest::where('purchase_order_id', $order->id)->latest()->value('invoice_link') ?: '#';
                            @endphp
                            @if($payLink !== '#' && $order->status_value === \App\Enum\PurchaseOrderStatus::NEW->value)
                                <a href="{{ $payLink }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary">Proceed to payment</a>
                            @endif
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>

</x-default-layout>
