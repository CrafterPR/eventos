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
                    <form method="GET" action="{{ route('events.purchases.index') }}" class="filters-row"
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
                        <a href="{{ route('events.purchases.export', request()->only(['payment_method','status','ticket_type','date_from','date_to'])) }}" class="btn btn-sm btn-outline">Export Excel</a>
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
                            <th>Status</th>
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
                                <td>{{ $order->currency ?? 'KSH' }} {{ number_format($order->amount, 2) }} </td>
                                <td>{{ strtoupper($order->payment_method ?? '') }}</td>
                                <td>
                                    @php
                                        $status =  $order->status;
                                    @endphp
                                    @if($status === \App\Enum\PurchaseOrderStatus::PAID)
                                        <span class="badge bg-success">PAID</span>
                                    @elseif($status === \App\Enum\PurchaseOrderStatus::NEW)
                                        <span class="badge bg-warning">PENDING</span>
                                    @else
                                        <span class="badge bg-secondary">{{ Str::upper($status->value) }}</span>
                                    @endif
                                </td>
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
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-light dropdown-toggle" type="button" id="dropdownActions{{ $order->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownActions{{ $order->id }}">
                                            @can('view-purchase')
                                                <li><a class="dropdown-item" href="{{ route('events.purchases.show', $order) }}">View Details</a></li>
                                            @endcan
                                            
                                            @if((string) $order->status === \App\Enum\PurchaseOrderStatus::NEW->value)
                                                  @can('send-purchase-reminder')
                                                    <li>
                                                        <form method="POST" action="{{ route('events.purchases.resend_reminder', $order) }}" class="resend-reminder-form" data-ref="{{ $order->reference }}" style="margin: 0;">
                                                            @csrf
                                                            <button type="submit" class="dropdown-item" style="width: 100%; text-align: left; border: 0; padding: 0.5rem 1rem; cursor: pointer;">Send Reminder</button>
                                                        </form>
                                                    </li>
                                                @endcan
                                                
                                                @can('mark-purchase-paid')
                                                    <li><hr class="dropdown-divider"></li>
                                                    <li>
                                                        <form method="POST" action="{{ route('events.purchases.mark_paid', $order) }}" class="mark-paid-form" data-ref="{{ $order->reference }}" style="margin: 0;">
                                                            @csrf
                                                            <button type="submit" class="dropdown-item text-success" style="width: 100%; text-align: left; border: 0; padding: 0.5rem 1rem; cursor: pointer;">Mark as Paid</button>
                                                        </form>
                                                    </li>
                                                @endcan
                                            @endif
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="7" class="text-center text-muted">No purchase orders found.</td></tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-3">{{ $pendingOrders->links('pagination::bootstrap-4') }}</div>

            </div>
        </div>
    </div>

    @push('scripts')
        <style>
            .dropdown-menu form {
                width: 100%;
                margin: 0;
                padding: 0;
            }
            .dropdown-menu form button {
                display: block;
                width: 100%;
                text-align: left;
                border: none;
                background: none;
                font-size: inherit;
                padding: 0.5rem 1rem;
                cursor: pointer;
            }
            .dropdown-menu form button:hover {
                background-color: #f8f9fa;
            }
        </style>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const forms = document.querySelectorAll('.resend-reminder-form, .mark-paid-form');
                forms.forEach(function (form) {
                    form.addEventListener('submit', function (e) {
                        e.preventDefault();
                        e.stopPropagation();
                        
                        const ref = form.dataset.ref || '';
                        const isMarkPaid = form.classList.contains('mark-paid-form');
                        const title = isMarkPaid ? 'Mark as Paid?' : 'Send payment reminder?';
                        const text = isMarkPaid ? 'This will mark order ' + ref + ' as paid and generate delegates.' : 'Send reminder to purchaser for ' + ref + '?';

                        const showConfirmation = () => {
                            if (typeof Swal === 'undefined') {
                                if (confirm(title + '\n\n' + text)) {
                                    submitForm();
                                }
                                return;
                            }

                            Swal.fire({
                                title: title,
                                text: text,
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonText: 'Yes, proceed',
                                cancelButtonText: 'Cancel',
                                allowOutsideClick: false,
                                allowEscapeKey: false
                            }).then(function (result) {
                                if (result.isConfirmed) {
                                    submitForm();
                                }
                            });
                        };

                        const submitForm = () => {
                            const formData = new FormData(form);
                            const action = form.getAttribute('action');
                            const method = form.getAttribute('method') || 'POST';
                            
                            fetch(action, {
                                method: method,
                                headers: {
                                    'X-Requested-With': 'XMLHttpRequest',
                                    'Accept': 'application/json'
                                },
                                body: formData
                            })
                            .then(response => {
                                if (response.ok) {
                                    return response.json();
                                }
                                throw new Error('Network error: ' + response.status);
                            })
                            .then(data => {
                                // Redirect after success
                                window.location.reload();
                            })
                            .catch(error => {
                                console.error('Form submission error:', error);
                                if (typeof Swal !== 'undefined') {
                                    Swal.fire('Error', 'Failed to submit. Please try again.', 'error');
                                } else {
                                    alert('Failed to submit. Please try again.');
                                }
                            });
                        };

                        showConfirmation();
                    });
                });

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
                } catch (e) {
                    console.warn('flatpickr not available');
                }
            });
        </script>
    @endpush
</x-default-layout>
