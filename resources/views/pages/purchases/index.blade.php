<x-default-layout>
    <div class="container py-8">
        <div class="mb-6">
            <h1 class="text-2xl font-bold">Purchase Orders</h1>
            <p class="text-sm text-slate-600">List of purchase orders and their status</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <div class="mb-4">
                    <nav class="flex gap-2">
                        <a href="#pending" class="btn btn-sm btn-outline">Pending</a>
                        <a href="#paid" class="btn btn-sm btn-outline">Paid</a>
                    </nav>
                </div>

                <h3 id="pending" class="text-lg font-semibold mb-2">Pending payment</h3>
                <table class="table table-striped mb-6">
                    <thead>
                        <tr>
                            <th>Reference</th>
                            <th>Purchaser</th>
                            <th>Amount</th>
                            <th>Payment Method</th>
                            <th>Invoice</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pendingOrders as $order)
                            @php
                                $invoiceLink = \App\Models\Pesaflow\PesaflowRequest::where('purchase_order_id', $order->id)->latest()->value('invoice_link');
                            @endphp
                            <tr>
                                <td>{{ $order->reference }}</td>
                                <td>
                                    {{ $order->user?->first_name }} {{ $order->user?->last_name }}<br>
                                    <small>{{ $order->payment_email ?? $order->user?->email }}</small>
                                </td>
                                <td>{{ number_format($order->amount, 2) }} {{ $order->currency ?? 'KSH' }}</td>
                                <td>{{ strtoupper($order->payment_method ?? '') }}</td>
                                <td>
                                    @if($invoiceLink)
                                        <a href="{{ $invoiceLink }}" target="_blank" class="text-sm">Open invoice</a>
                                    @else
                                        <span class="text-xs text-muted">—</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('events.purchases.show', $order) }}" class="btn btn-sm btn-light">View</a>

                                    <form method="POST" action="{{ route('events.purchases.resend_reminder', $order) }}" class="inline-block" onsubmit="return confirm('Send payment reminder to purchaser?')">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-primary">Resend reminder</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="6">No pending purchase orders found.</td></tr>
                        @endforelse
                    </tbody>
                </table>

                <h3 id="paid" class="text-lg font-semibold mb-2">Paid orders</h3>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Reference</th>
                            <th>Purchaser</th>
                            <th>Amount</th>
                            <th>Payment Method</th>
                            <th>Paid at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($paidOrders as $order)
                            <tr>
                                <td>{{ $order->reference }}</td>
                                <td>{{ $order->user?->first_name }} {{ $order->user?->last_name }}<br><small>{{ $order->user?->email }}</small></td>
                                <td>{{ number_format($order->amount, 2) }} {{ $order->currency ?? 'KSH' }}</td>
                                <td>{{ strtoupper($order->payment_method ?? '') }}</td>
                                <td>{{ optional($order->updated_at)->toDateTimeString() }}</td>
                                <td>
                                    <a href="{{ route('events.purchases.show', $order) }}" class="btn btn-sm btn-light">View</a>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="6">No paid purchase orders found.</td></tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-default-layout>
