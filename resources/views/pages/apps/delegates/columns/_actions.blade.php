<a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
    Actions
    <i class="ki-duotone ki-down fs-5 ms-1"></i>
</a>
<!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    @can('login-as-delegate')
    <div class="menu-item px-3">
        @canBeImpersonated($user, $guard = null)
        <a href="{{ route('impersonate', $user->id) }}"  target="_blank" class="menu-link px-3">
            Login as {{ $user->first_name }}
        </a>
        @endCanBeImpersonated
    </div>
    @endcan
    @can('redeem-coupon-for-delegates')
        <div class="menu-item px-3">

            <a href="#" class="menu-link px-3" data-kt-delegate-id="{{ $user->id }}" data-bs-toggle="modal" data-bs-target="#kt_modal_redeem_coupon" data-kt-action="redeem_coupon">
                Redeem coupon
            </a>

        </div>
    @endcan
    <!--end::Menu item-->

    <!--begin::Menu item-->
    @can('edit-delegate')
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-delegate-id="{{ $user->id }}" data-bs-toggle="modal" data-bs-target="#kt_modal_add_delegate" data-kt-action="update_row">
            Edit
        </a>
    </div>
    @endcan
    <!--end::Menu item-->
   @can('edit-delegate')
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-delegate-id="{{ $user->id }}" data-kt-action="delete_row">
            De-activate
        </a>
    </div>
    @endcan
    <!--end::Menu item-->
</div>
<!--end::Menu-->
