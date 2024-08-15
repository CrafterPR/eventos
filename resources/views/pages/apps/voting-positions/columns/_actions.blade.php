@php use App\Enum\VotingPositionStatus; @endphp
<a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
    Actions
    <i class="ki-duotone ki-down fs-5 ms-1"></i>
</a>
<!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->

    @can('enable-voting-position')
        @if($position->status === VotingPositionStatus::DISABLED->value)
        <div class="menu-item px-3">
            <a href="#" data-kt-position-id="{{ $position->uuid }}" data-kt-action="enable_position" class="menu-link px-3">
                Enable
            </a>
        </div>
        @endif
    @endcan
    @can('disable-voting-position')
        @if($position->status === VotingPositionStatus::ENABLED->value)
            <div class="menu-item px-3">
            <a href="#" data-kt-position-id="{{ $position->uuid }}" data-kt-action="disable_position" class="menu-link px-3">
                Disable
            </a>
        </div>
        @endif
    @endcan
    @can('delete-voting-position')
        @if($position->status !== VotingPositionStatus::ENABLED->value)
        <div class="menu-item px-3">
            <a href="#" class="menu-link px-3" data-kt-position-id="{{ $position->uuid }}" data-kt-action="delete_position">
                Delete
            </a>
        </div>
        <!--end::Menu item-->
      @endif
    @endcan
    @can('view-voting-period-activity-logs')
        <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-position-id="{{ $position->uuid }}" data-kt-action="view_logs">
            View Logs
        </a>
    </div>
        <!--end::Menu item-->
    @endcan
</div>
<!--end::Menu-->

