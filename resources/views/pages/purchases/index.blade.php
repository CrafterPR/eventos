<x-default-layout>
    <div class="container py-8">
        <div class="mb-6">
            <h1 class="text-2xl font-bold">Ticket Purchases</h1>
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
                <div class="mb-4 row">
                    <form method="POST" action="{{ route('events.purchases.index') }}" class="filters-row"
                          style="display:flex;flex-wrap:wrap;gap:8px;align-items:center;">
                        <div class="row">
                        <div class="col-md-2">
                            <select name="payment_method" class="form-select form-select-sm">
                                <option value="all">All methods</option>
                                <option value="pesaflow" {{ request('payment_method')=='pesaflow' ? 'selected' : '' }}>Pesaflow</option>
                                <option value="lpo" {{ request('payment_method')=='lpo' ? 'selected' : '' }}>LPO</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                        <select name="status" class="form-select form-select-sm">
                            <option value="all">All status</option>
                            <option value="new" {{ request('status')== \App\Enum\PurchaseOrderStatus::NEW->value ?
                            'selected' : '' }}>Pending</option>
                            <option value="paid" {{ request('status')== \App\Enum\PurchaseOrderStatus::PAID->value ? 'selected' : '' }}>Paid</option>
                        </select>
                        </div>
                        <div class="col-md-3">
                        @php $categories = \App\Models\Category::pluck('title','id'); @endphp
                        <select name="ticket_type" class="form-select form-select-sm">
                            <option value="">Any ticket type</option>
                            @foreach($categories as $id => $title)
                                <option value="{{ $id }}" {{ request('ticket_type') == (string) $id ? 'selected' : '' }}>{{ $title }}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="col-md-2">
                        <input type="hidden" name="date_from" id="date_from" value="{{ request('date_from') }}" />
                        <input type="hidden" name="date_to" id="date_to" value="{{ request('date_to') }}" />
                        <input type="text" id="purchase_date_range" class="form-control form-control-sm" placeholder="Select date range" value="{{ request('date_from') && request('date_to') ? request('date_from') . ' to ' . request('date_to') : '' }}" />

                        </div>
                        <div class="col-md-3">
                        <button type="submit" class="btn btn-sm btn-secondary">Filter</button>
                        <a href="{{ route('events.purchases.export', request()->all()) }}" class="btn btn-sm btn-outline">Export Excel</a>
                        </div>
                        </div>
                    </form>
                </div>


                @if(request('payment_method') === 'lpo')
                    <div class="card mb-4">
                        <div class="card-body">
                            <livewire:purchases.lpo-purchases-table />
                        </div>
                    </div>
                @endif
                <table class="table table-striped mb-6">
                    <thead>
                        <tr>
                            <th>Reference</th>
                            <th>Purchaser</th>
                            <th>Amount</th>
                            <th>Payment Method</th>
                            <th>Tickets</th>
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
                                    @php
                                        $tickets = is_array($order->tickets) ? $order->tickets : (json_decode($order->tickets, true) ?: []);
                                    @endphp
                                    <div class="text-sm">
                                        @foreach($tickets as $t)
                                            @if(is_array($t))
                                                <div class="mb-1">
                                                    <strong>Type:</strong> {{ $t['category_id'] ?? ($t['type'] ?? 'N/A') }}
                                                    &middot; <strong>Amount:</strong> {{ isset($t['total']) ? number_format($t['total'], 2) : (isset($t['price']) ? number_format($t['price'],2) : '-') }}
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('events.purchases.show', $order) }}" class="btn btn-sm btn-light">View</a>

                                    <form method="POST" action="{{ route('events.purchases.resend_reminder', $order) }}" class="inline-block resend-reminder-form" data-ref="{{ $order->reference }}">
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
                <div class="mt-3">{{ $pendingOrders->links() }}</div>

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
                <div class="mt-3">{{ $paidOrders->links() }}</div>

            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const forms = document.querySelectorAll('.resend-reminder-form');
                forms.forEach(function (form) {
                    form.addEventListener('submit', function (e) {
                        e.preventDefault();
                        const ref = form.dataset.ref || '';

                        if (typeof Swal === 'undefined') {
                            // Fallback to native confirm
                            if (confirm('Send payment reminder to purchaser for ' + ref + '?')) {
                                form.submit();
                            }
                            return;
                        }

                        Swal.fire({
                            title: 'Send payment reminder?',
                            text: 'Send reminder to purchaser for ' + ref + '?',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Yes, send',
                            cancelButtonText: 'Cancel'
                        }).then(function (result) {
                            if (result.isConfirmed) {
                                form.submit();
                            }
                        });
                    });
                });

    // Initialize flatpickr range for purchase date
    try {
        if (typeof flatpickr !== 'undefined') {
            flatpickr('#purchase_date_range', {
                mode: 'range',
                dateFormat: 'Y-m-d',
                allowInput: true,
                onClose: function(selectedDates, dateStr) {
                    if (!dateStr) {
                        document.getElementById('date_from').value = '';
                        document.getElementById('date_to').value = '';
                        return;
                    }
                    var parts = dateStr.split(' to ');
                    if (parts.length === 2) {
                        document.getElementById('date_from').value = parts[0];
                        document.getElementById('date_to').value = parts[1];
                    } else {
                        document.getElementById('date_from').value = parts[0];
                        document.getElementById('date_to').value = parts[0];
                    }
                }
            });
        }
    } catch (err) {
        // ignore
    }

            });
        </script>
    @endpush

</x-default-layout>
