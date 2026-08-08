<x-default-layout>
    @section('title', 'Purchase More Tickets')

    <div class="container py-10">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-800 mb-2">Purchase Additional Tickets</h1>
            <p class="text-slate-600">Select the tickets you'd like to add to your order</p>
        </div>

        {{-- Expose authenticated user data for the component to prefill when purchasing more --}}
        @if(isset($authUser) && $authUser)
            <script>window.authUser = @json([ 'id' => $authUser->id, 'email' => $authUser->email, 'mobile' => $authUser->mobile ?? null, 'first_name' => $authUser->first_name ?? null, 'last_name' => $authUser->last_name ?? null, 'country' => $authUser->country ?? null, 'organization' => $authUser->organization ?? null ]);</script>
        @endif

        <x-kicp.conference-tickets :is-purchase-more="true" />
    </div>

</x-default-layout>