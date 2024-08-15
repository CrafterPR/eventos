@php use App\Enum\VotingPeriodStatus; @endphp
<a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
    Actions
    <i class="ki-duotone ki-down fs-5 ms-1"></i>
</a>
<!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->

    @can('open-voting-periods')
        @if($period->status === VotingPeriodStatus::CLOSED->value || $period->status === VotingPeriodStatus::SUSPENDED->value)
        <div class="menu-item px-3">
            <a href="#" data-kt-period-id="{{ $period->uuid }}" data-kt-action="open_voting" class="menu-link px-3">
                Open
            </a>
        </div>
        @endif
    @endcan
    @can('close-voting-periods')
        @if($period->status === VotingPeriodStatus::OPEN->value)
            <div class="menu-item px-3">
            <a href="#" data-kt-period-id="{{ $period->uuid }}" data-kt-action="close_voting" class="menu-link px-3">
                Close
            </a>
        </div>
        @endif
    @endcan()

    @can('send-voting-reminders')
        @if($period->status === VotingPeriodStatus::OPEN->value)
            <div class="menu-item px-3">
            <a href="#" data-kt-period-id="{{ $period->uuid }}" data-kt-action="send_reminder" class="menu-link px-3">
                Send reminder
            </a>
        </div>
        @endif
    @endcan()
   @can('delete-voting-periods')
    @if($period->status !== VotingPeriodStatus::OPEN->value)
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-period-id="{{ $period->uuid }}" data-kt-action="delete_period">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
   @endif
    @endcan
    @can('view-voting-period-activity-logs')
        <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-period-id="{{ $period->uuid }}" data-kt-action="view_logs">
            View Logs
        </a>
    </div>
        <!--end::Menu item-->
    @endcan
</div>
<!--end::Menu-->

