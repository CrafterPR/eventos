<x-default-layout>
    @section('title')
        Sponsorships
    @endsection

    <div class="card">
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <div>
                    <h2 class="mb-1">Sponsorships</h2>
                    <p class="text-muted mb-0">Sponsorship applications and their payment details.</p>
                </div>
            </div>
        </div>

        <div class="card-body py-4">
            <div class="table-responsive">
                <table class="table align-middle table-row-dashed fs-6 gy-5">
                    <thead>
                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase">
                            <th>Reference</th>
                            <th>Company</th>
                            <th>Address</th>
                            <th>Company email</th>
                            <th>Contact person</th>
                            <th>Package</th>
                            <th>Amount</th>
                            <th>Payment</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 fw-semibold">
                        @forelse($sponsorships as $sponsorship)
                            <tr>
                                <td>{{ $sponsorship->reference }}</td>
                                <td>{{ $sponsorship->company_name }}</td>
                                <td>{{ $sponsorship->physical_address }}</td>
                                <td>{{ $sponsorship->company_email }}</td>
                                <td>
                                    {{ $sponsorship->contact_name }}<br>
                                    <span class="text-muted">{{ $sponsorship->contact_email }}</span><br>
                                    <span class="text-muted">{{ $sponsorship->contact_mobile }}</span>
                                </td>
                                <td>{{ $sponsorship->package }}</td>
                                <td>{{ $sponsorship->currency }} {{ number_format((float) $sponsorship->amount, 2) }}</td>
                                <td>
                                    <span class="badge {{ $sponsorship->status === 'settled' ? 'badge-light-success' : 'badge-light-primary' }}">
                                        {{ strtoupper($sponsorship->status) }}
                                    </span>
                                    @if($sponsorship->pesaflow_request?->pesaflowResponse)
                                        <br><small>Paid: {{ $sponsorship->currency }} {{ number_format((float) $sponsorship->pesaflow_request->pesaflowResponse->amount_paid, 2) }}</small>
                                        <br><small>Channel: {{ $sponsorship->pesaflow_request->pesaflowResponse->payment_channel ?: '—' }}</small>
                                    @endif
                                    @if($sponsorship->transaction_reference)
                                        <br><small>{{ $sponsorship->transaction_reference }}</small>
                                    @endif
                                    @if($sponsorship->pesaflow_request?->invoice_number)
                                        <br><small>Invoice: {{ $sponsorship->pesaflow_request->invoice_number }}</small>
                                    @endif
                                    @if($sponsorship->pesaflow_request?->pesaflowResponse?->payment_date)
                                        <br><small>{{ $sponsorship->pesaflow_request->pesaflowResponse->payment_date }}</small>
                                    @endif
                                </td>
                                <td>{{ $sponsorship->created_at?->format('Y-m-d H:i') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center text-muted py-8">No sponsorships found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{ $sponsorships->links() }}
        </div>
    </div>
</x-default-layout>
