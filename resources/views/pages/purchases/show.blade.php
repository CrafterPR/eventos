<x-default-layout>
    <div class="container py-8">
        <div class="mb-4">
            <h2 class="text-xl font-bold">Purchase {{ $order->reference }}</h2>
            <p class="text-sm text-slate-600">Status: <strong>{{ ucfirst($order->status) }}</strong></p>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="card mb-4">
            <div class="card-body">
                <p>Reference: <strong>{{ $order->reference }}</strong></p>
                <p>Amount: <strong>{{ number_format($order->amount, 2) }} {{ $order->currency ?? 'KSH' }}</strong></p>
                <p>Payment method: <strong>{{ strtoupper($order->payment_method ?? '') }}</strong></p>

                <h5 class="mt-3">Tickets</h5>
                @if(is_array($order->tickets))
                    <ul>
                        @foreach($order->tickets as $ticket)
                            <li>
                                @if(is_array($ticket) && isset($ticket['type']))
                                    <strong>{{ $ticket['type'] }}</strong> - {{ number_format(($ticket['price'] ?? 0) * ($ticket['count'] ?? ($ticket['quantity'] ?? 1)), 2) }}
                                    <div class="text-muted">{{ $ticket['first_name'] ?? '' }} {{ $ticket['last_name'] ?? '' }} {{ $ticket['email'] ?? '' }}</div>
                                @else
                                    {{ json_encode($ticket) }}
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @else
                    <pre>{{ json_encode($order->tickets) }}</pre>
                @endif

                <h5 class="mt-3">Purchaser</h5>
                <p>{{ $order->user?->first_name }} {{ $order->user?->last_name }} ({{ $order->user?->email }})</p>

                <div class="mt-4">
                    @if($order->payment_receipt)
                        <p>Payment receipt: <a href="{{ asset('storage/' . $order->payment_receipt) }}" target="_blank">View</a></p>
                    @else
                        <form action="{{ route('purchases.receipt.upload', $order) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-2">
                                <label class="form-label">Upload payment receipt (bank slip)</label>
                                <input type="file" name="receipt" class="form-control" required />
                            </div>
                            <button class="btn btn-sm btn-primary">Upload receipt</button>
                        </form>
                    @endif
                </div>

                <div class="mt-4">
                    @if($order->status === 'new' && $order->payment_receipt)
                        <form action="{{ route('purchases.approve', $order) }}" method="post">
                            @csrf
                            <button class="btn btn-success">Approve Purchase & Create Delegates</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>

    </div>
</x-default-layout>