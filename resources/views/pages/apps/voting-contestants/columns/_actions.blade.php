@php use App\Enum\ContestantStatus; @endphp
<a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
    Actions
    <i class="ki-duotone ki-down fs-5 ms-1"></i>
</a>
<!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->

    @can('enable-contestant')
            @if($contestant->status === ContestantStatus::DISABLED->value)
            <div class="menu-item px-3">
                <a href="#" data-kt-contestant-id="{{ $contestant->uuid }}" data-kt-action="enable_contestant" class="menu-link px-3">
                    Enable
                </a>
            </div>
            @endif
    @endcan
    @can('disable-contestant')
            @if($contestant->status === ContestantStatus::ENABLED->value)
                <div class="menu-item px-3">
                <a href="#" data-kt-contestant-id="{{ $contestant->uuid }}" data-kt-action="disable_contestant" class="menu-link px-3">
                    Disable
                </a>
            </div>
            @endif
    @endcan
    @can('delete-contestant')
        @if($contestant->status !== ContestantStatus::ENABLED->value)
        <div class="menu-item px-3">
            <a href="#" class="menu-link px-3" data-kt-contestant-id="{{ $contestant->uuid }}" data-kt-action="delete_contestant">
                Delete
            </a>
        </div>
        <!--end::Menu item-->
      @endif
    @endcan()
    @can('view-voting-period-activity-logs')
        <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-contestant-id="{{ $contestant->uuid }}" data-kt-action="view_logs">
            View Logs
        </a>
    </div>
        <!--end::Menu item-->
    @endcan
</div>
<!--end::Menu-->

