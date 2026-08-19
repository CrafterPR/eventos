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
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Reference</th>
                            <th>Purchaser</th>
                            <th>Amount</th>
                            <th>Payment Method</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->reference }}</td>
                                <td>{{ $order->user?->first_name }} {{ $order->user?->last_name }}<br><small>{{ $order->user?->email }}</small></td>
                                <td>{{ number_format($order->amount, 2) }} {{ $order->currency ?? 'KSH' }}</td>
                                <td>{{ strtoupper($order->payment_method ?? '') }}</td>
                                <td>{{ ucfirst($order->status) }}</td>
                                <td>
                                    <a href="{{ route('purchases.show', $order) }}" class="btn btn-sm btn-light">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4">{{ $orders->links() }}</div>

            </div>
        </div>
    </div>
</x-default-layout>