@php use App\Enum\BookingStatus;use App\Enum\OrderItemStatus; @endphp
<a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click"
   data-kt-menu-placement="bottom-end">
    Actions
    <i class="ki-duotone ki-down fs-5 ms-1"></i>
</a>
<!--begin::Menu-->
<div
    class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
    data-kt-menu="true">
    <!--begin::Menu item-->

    @can('view-reserve-details')
        @if($booth->bookings?->booking_status->value == BookingStatus::RESERVED->value)
            <div class="menu-item px-3">
                <a href="#" data-kt-ticket-id="{{ $booth->id }}" data-kt-action="view_row" class="menu-link px-3">
                    View reservation
                </a>
            </div>
        @endif
    @endcan

    @if($booth->bookings?->booking_status == null)
        @can('reserve-booth')
            <div class="menu-item px-3">
                <a href="#" data-kt-booth-id="{{ $booth->id }}" data-bs-toggle="modal"
                   data-bs-target="#kt_modal_reserve_booth" data-kt-action="reserve_booth" class="menu-link px-3">
                    Reserve booth
                </a>
            </div>
        @endcan
        @can('edit booth details')
            <div class="menu-item px-3">
                <a href="#" data-kt-ticket-id="{{ $booth->id }}" data-kt-action="edit_row" class="menu-link px-3">
                    Edit details
                </a>
            </div>
        @endcan
    @endif

    @if($booth->bookings?->booking_status->value == BookingStatus::RESERVED->value)
        @can('revoke-booth-booking')
            <div class="menu-item px-3">
                <a href="#" class="menu-link px-3" data-kt-booth-id="{{ $booth->id }}" data-kt-action="revoke_booking">
                    Revoke booking
                </a>
            </div>
        @endcan
        <!--end::Menu item-->
    @endif
</div>
<!--end::Menu-->

