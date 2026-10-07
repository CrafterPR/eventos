<x-default-layout>
    @section('title')
        Payment Requests
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('events.payment-requests.index') }}
    @endsection

    <div class="card">
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <div>
                    <h2 class="mb-1">Payment requests</h2>
                    <p class="text-muted mb-0">Pesaflow requests and their related purchase order details.</p>
                </div>
            </div>
        </div>

        <div class="card-body py-4">
            <form method="GET" action="{{ route('events.payment-requests.index') }}"
                  class="row g-3 align-items-end mb-6">
                <div class="col-12 col-md-3">
                    <label for="filter-status" class="form-label">Status</label>
                    <select id="filter-status" name="status" class="form-select">
                        <option value="">All statuses</option>
                        @foreach($statuses as $status)
                            <option value="{{ $status->value }}" @selected(request('status') === $status->value)>
                                {{ strtoupper($status->value) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-md-3">
                    <label for="filter-ticket-type" class="form-label">Ticket type</label>
                    <select id="filter-ticket-type" name="ticket_type" class="form-select">
                        <option value="">All ticket types</option>
                        @foreach($ticketTypes as $value => $label)
                            <option value="{{ $value }}" @selected(request('ticket_type') === $value)>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-md-2">
                    <label for="filter-currency" class="form-label">Currency</label>
                    <select id="filter-currency" name="currency" class="form-select">
                        <option value="">All currencies</option>
                        @foreach($currencies as $currency)
                            <option value="{{ $currency->value }}" @selected(request('currency') === $currency->value)>
                                {{ $currency->value }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-md-2">
                    <label for="filter-country" class="form-label">Country</label>
                    <select id="filter-country" name="country" class="form-select">
                        <option value="">All countries</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->id }}" @selected(request('country') === $country->id)>
                                {{ $country->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-md-2 d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <a href="{{ route('events.payment-requests.index') }}" class="btn btn-light">Clear</a>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table align-middle table-row-dashed fs-6 gy-5">
                    <thead>
                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase">
                            <th>Invoice</th>
                            <th>Purchase order</th>
                            <th>Ticket type</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Currency</th>
                            <th>Country</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 fw-semibold">
                        @forelse($paymentRequests as $paymentRequest)
                            @php
                                $purchaseOrder = $paymentRequest->purchase_order;
                                $ticketLabels = [];
                                foreach ($purchaseOrder?->tickets ?? [] as $ticket) {
                                    if (!is_array($ticket)) {
                                        continue;
                                    }
                                    if (!empty($ticket['category_id'])) {
                                        $ticketLabels[] = $categories->get((string) $ticket['category_id'], 'Category ' . $ticket['category_id']);
                                    } elseif (!empty($ticket['type'])) {
                                        $ticketLabels[] = $ticket['type'];
                                    }
                                }
                            @endphp
                            <tr>
                                <td>{{ $paymentRequest->invoice_number ?: '—' }}</td>
                                <td>{{ $purchaseOrder?->reference ?: '—' }}</td>
                                <td>{{ implode(', ', array_unique($ticketLabels)) ?: '—' }}</td>
                                <td>{{ number_format((float) $paymentRequest->amount_expected, 2) }}</td>
                                <td><span class="badge badge-light-primary">{{ strtoupper($paymentRequest->status->value) }}</span></td>
                                <td>{{ $paymentRequest->currency->value }}</td>
                                <td>{{ $purchaseOrder?->user?->country?->name ?: '—' }}</td>
                                <td>{{ $paymentRequest->created_at?->format('Y-m-d H:i') ?: '—' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted py-8">No payment requests found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $paymentRequests->links() }}
            </div>
        </div>
    </div>
</x-default-layout>
