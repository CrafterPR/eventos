<x-default-layout>
    @section('title', 'Print Ticket')

    <style>
        @media print {
            body * {
                visibility: hidden;
            }

            #printable-ticket,
            #printable-ticket * {
                visibility: visible;
            }

            #printable-ticket {
                position: absolute;
                inset: 0;
                width: 100%;
                max-width: none !important;
                border: 0 !important;
                box-shadow: none !important;
            }

            #printable-ticket button,
            #printable-ticket a {
                display: none !important;
            }
        }
    </style>

    <div class="container py-8">
        <div class="card mx-auto text-center p-8" id="printable-ticket" style="max-width: 500px;">
            <h1 class="mb-3">{{ $delegate->name }}</h1>
            @if($delegate->organization)
                <h3 class="mb-4">{{ $delegate->organization }}</h3>
            @endif
            <div class="d-flex justify-content-center align-items-center my-6">
                {!! QrCode::size(180)->color(75, 0, 130)->generate($delegate->id) !!}
            </div>
            <h3 class="mb-4">{{ $ticketType }}</h3>
            <h5 class="text-muted">{{ $delegate->event->footer_text ?? 'Powered by www.craftedpr.co.ke' }}</h5>
            <div class="mt-6">
                <button type="button" class="btn btn-primary" onclick="window.print()">Print ticket</button>
                <a href="{{ route('dashboard') }}" class="btn btn-light ms-2">Back to dashboard</a>
            </div>
        </div>
    </div>
</x-default-layout>
