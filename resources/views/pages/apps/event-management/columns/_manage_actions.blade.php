<a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
    Actions
    <i class="ki-duotone ki-down fs-5 ms-1"></i>
</a>
<!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    @can('mark-purchase-paid')
        @php $rowStatus = is_string($row->status) ? $row->status : ( $row->status instanceof \BackedEnum ? $row->status->value : (string)$row->status ); @endphp
        @if($rowStatus === \App\Enum\PurchaseOrderStatus::NEW->value)
        <div class="menu-item px-3">
            <form method="POST" action="{{ route('events.purchases.mark_paid', ['purchaseOrder' => $row->id]) }}" class="mark-paid-form" data-ref="{{ $row->reference }}">
                @csrf
                <button type="submit" class="menu-link px-3 border-0 bg-transparent w-100 text-start">Mark as paid</button>
            </form>
        </div>
            @endif
    @endcan
    @can('ticker.purchase.show')
    <div class="menu-item px-3">
        <a href="{{ route('events.purchases.show', $row) }}" class="menu-link px-3">View details</a>
    </div>
    @endcan
    @can('resend-payment-reminder')
        @if($row->status === \App\Enum\PurchaseOrderStatus::NEW)
        <form method="POST" action="{{ route('events.purchases.resend_reminder', $row) }}" class="inline-block resend-reminder-form" data-ref="{{ $row->reference }}">
            @csrf
            <div class="menu-item px-3">
            <button type="submit" class="menu-link px-3">Send reminder</button>
            </div>
        </form>
        @endif
    @endcan

    @can('delete-ticket')
    @if($rowStatus === \App\Enum\PurchaseOrderStatus::FAILED->value || $rowStatus === \App\Enum\PurchaseOrderStatus::CANCELLED->value)
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-order-id="{{ $row->id }}" data-kt-action="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
   @endif
        @endcan
</div>
<!--end::Menu-->
