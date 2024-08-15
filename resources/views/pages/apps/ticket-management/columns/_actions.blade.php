@php use App\Enum\OrderItemStatus; @endphp
<a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
    Actions
    <i class="ki-duotone ki-down fs-5 ms-1"></i>
</a>
<!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->

    @can('approve-tickets')
        @if($orderItem->status == OrderItemStatus::PAID->value || $orderItem->status == OrderItemStatus::RAISED->value)
        <div class="menu-item px-3">
            <a href="#" data-kt-ticket-id="{{ $orderItem->id }}" data-kt-action="approve_row" class="menu-link px-3">
                Approve
            </a>
        </div>
        @endif
        @if($orderItem->status == OrderItemStatus::APPROVED->value)
            <div class="menu-item px-3">
            <a href="#" data-kt-ticket-id="{{ $orderItem->id }}" data-kt-action="un_approve_row" class="menu-link px-3">
                Un-approve
            </a>
        </div>
        @endif
    @endcan()

    @can('send-payment-reminders')
        @if($orderItem->status == OrderItemStatus::PENDING->value)
            <div class="menu-item px-3">
            <a href="#" data-kt-ticket-id="{{ $orderItem->id }}" data-kt-action="reminder_row" class="menu-link px-3">
                Send reminder
            </a>
        </div>
        @endif
    @endcan()
    @can('update-payment-manually')
        @if($orderItem->status == OrderItemStatus::PENDING->value)
            <div class="menu-item px-3">
            <a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_update_purchase" data-kt-ticket-id="{{ $orderItem->id }}" data-kt-action="update_manually" >
                Update manually
            </a>
        @endif
    @endcan()

    @if($orderItem->status == OrderItemStatus::PENDING->value)
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ticket-id="{{ $orderItem->id }}" data-kt-action="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
   @endif
</div>
<!--end::Menu-->

