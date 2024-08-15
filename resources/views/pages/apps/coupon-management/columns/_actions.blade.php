<a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
    Actions
    <i class="ki-duotone ki-down fs-5 ms-1"></i>
</a>
<!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->

    @can('activate-coupon')
        @if($coupon->status == \App\Enum\CouponStatus::INACTIVE->value)
        <div class="menu-item px-3">
            <a href="#" data-kt-coupon-id="{{ $coupon->id }}" data-kt-action="activate_row" class="menu-link px-3">
                Enable
            </a>
        </div>
        @endif
        @if($coupon->status == \App\Enum\CouponStatus::ACTIVE->value)
            <div class="menu-item px-3">
            <a href="#" data-kt-coupon-id="{{ $coupon->id }}" data-kt-action="inactivate_row" class="menu-link px-3">
                Disable
            </a>
        </div>
        @endif
    @endcan()
     @if($coupon->status == \App\Enum\CouponStatus::ACTIVE->value)
            <div class="menu-item px-3">
            <a href="#" data-kt-coupon-id="{{ $coupon->id }}" data-kt-action="send_coupon" class="menu-link px-3">
                Send coupon
            </a>
        </div>
     @endif
    @can('edit-coupon-capacity')
        @if($coupon->status == \App\Enum\CouponStatus::ACTIVE->value)
            <div class="menu-item px-3">
                <a href="#" data-bs-toggle="modal"
                   data-bs-target="#kt_modal_incdec_coupon" data-kt-coupon-id="{{ $coupon->id }}" data-kt-action="edit_coupon" class="menu-link px-3">
                    +/- capacity
                </a>
            </div>
        @endif
    @endcan()

</div>
<!--end::Menu-->

