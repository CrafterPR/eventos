<x-default-layout>
    @section('title', 'Purchase More Tickets')

    <div class="container py-10">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-800 mb-2">Purchase Additional Tickets</h1>
            <p class="text-slate-600">Select the tickets you'd like to add to your order</p>
        </div>
        <x-kicp.conference-tickets :is-purchase-more="true" />
    </div>

</x-default-layout>