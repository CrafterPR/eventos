@php use App\Models\User; @endphp
@php(extract($data))

<x-default-layout>
    @section('title')
        Dashboard
    @endsection

    @can('view-quick-links')
        <div class="row g-5 g-xl-10 m-5 mb-xl-10">
            <div class="row card card-flush pb-6">
                <!-- Dashboard Quick Links -->
                <div class="card-header p-4">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-gray-800">Quick Links</span>
                    </h3>
                </div>
                <div class="col-12">
                    <div class="d-flex flex-wrap gap-2">
                        <!-- Transparent Link 1 -->
                        @can('checkin-event')
                            <div class="card-toolbar">
                                <a href="#" class="btn btn-lg btn-flex btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_checkin_event">
                                    <i class="ki-duotone ki-scan-barcode fs-2qx">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                        <span class="path5"></span>
                                        <span class="path6"></span>
                                        <span class="path7"></span>
                                        <span class="path8"></span>
                                    </i>Checkin Delegate
                                </a>
                            </div>
                        @endcan
                        <!-- Transparent Link 3 -->
                        @can('create-delegate')
                            <div class="card-toolbar">
                                <a href="{{ route('users.delegates.create') }}" class="btn btn-lg btn-flex btn-light-primary" id="">
                                    <i class="ki-duotone ki-user-tick  fs-2qx">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>Add a Delegate
                                </a>
                            </div>
                        @endcan
                        <!-- Transparent Link 4 -->
                        @can('import-delegates')
                            <div class="card-toolbar">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#kt_modal_import_delegates" class="btn btn-lg btn-flex btn-light-primary" id="">
                                    <i class="ki-duotone ki-file-up  fs-2qx">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>import Delegates
                                </a>
                            </div>
                        @endcan
                        @can('manage-delegates')
                            <div class="card-toolbar">
                                <!--begin::Filter-->
                                <a href="{{ route('users.delegates.index') }}" class="btn btn-lg btn-flex btn-light-primary" id="">
                                    <i class="ki-duotone ki-people fs-2qx">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                        <span class="path5"></span>
                                    </i>View delegates
                                </a>
                                <!--end::Filter-->
                            </div>
                        @endcan
                        @can('register-event')
                            <div class="card-toolbar">
                                <a href="#" class="btn btn-lg btn-flex btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_event">
                                    <i class="ki-duotone ki-brifecase-tick fs-2qx">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>Create Event
                                </a>
                            </div>
                        @endcan
                        <!-- Transparent Link 5 -->
                       @can('manage-events')
                        <div class="card-toolbar">
                            <a href="{{ route('events.manage-events.index') }}" class="btn btn-lg btn-flex btn-light-primary" id="">
                                <i class="ki-duotone ki-text-number  fs-2qx">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                    <span class="path5"></span>
                                    <span class="path6"></span>
                                </i>View Events
                            </a>
                        </div>
                        @endcan
                        <!-- Add more links as needed -->
                    </div>
                </div>
            </div>
        </div>
            <livewire:events.create-event-modal />
            <livewire:events.checkin-modal />
            <livewire:delegate.import-delegates-modal></livewire:delegate.import-delegates-modal>
    @endcan
    @can('view-dashboard')
        <div class="row g-5 g-xl-10 mx-5 mp-n4 mb-xl-10">
            <div class="d-flex align-items-center">
                <h3 class="card-title align-items-start flex-column"></h3>
                <div class="card-toolbar ms-auto"> <!-- Use 'ms-auto' to push it to the right -->
                    <a href="#" class="btn btn-sm btn-light">
                    <button type="button" class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <i class="ki-duotone ki-setting-3 fs-3">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                            <span class="path5"></span>
                        </i>
                    </button>
                        Filter by event</a>
                    <!--begin::Task menu-->
                    <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" data-kt-menu-id="kt-users-tasks">
                        <!--begin::Header-->
                        <div class="px-7 py-5">
                            <div class="fs-5 text-dark fw-bold">Update Status</div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Menu separator-->
                        <div class="separator border-gray-200"></div>
                        <!--end::Menu separator-->
                        <!--begin::Form-->
                        <form class="form px-7 py-5" data-kt-menu-id="kt-users-tasks-form">
                            <!--begin::Input group-->
                            <div class="fv-row mb-10">
                                <!--begin::Label-->
                                <label class="form-label fs-6 fw-semibold">Status:</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select class="form-select form-select-solid" name="task_status" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-hide-search="true">
                                    <option></option>
                                    <option value="1">Approved</option>
                                    <option value="2">Pending</option>
                                    <option value="3">In Process</option>
                                    <option value="4">Rejected</option>
                                </select>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Actions-->
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-users-update-task-status="reset">Reset</button>
                                <button type="submit" class="btn btn-sm btn-primary" data-kt-users-update-task-status="submit">
                                    <span class="indicator-label">Apply</span>
                                    <span class="indicator-progress">Please wait...
                                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                </div>
            </div>

            <div class="col-md-8 card card-flush h-md-100">
                <div class="card-header pt-7 d-flex">
                    <h3 class="card-title align-items-start flex-column justify-content-center">
                        <span class="card-label fw-bold text-gray-800">Delegate Checkins by Date</span>
                    </h3>
                    <div class="card-toolbar">
                        <a href="#" class="btn btn-sm btn-light">View All</a>
                    </div>
                </div>
                <div id="chartdiv"></div>
            </div>
            <div class="col-md-4 card card-flush h-md-100">
                <div class="card-header pt-7 d-flex">
                    <h3 class="card-title align-items-start flex-column justify-content-center">
                        <span class="card-label fw-bold text-gray-800">Total delegates by category</span>
                    </h3>
                    <div class="card-toolbar">
                        <a href="{{ route('users.delegates.index') }}" class="btn btn-sm btn-light">View All</a>
                    </div>
                </div>
                <div id="pieChartDiv"></div>
            </div>
        </div>
  @endcan
    <div class="row">
        <div class="col-md-12">
            <div class="card card-flush h-md-100">
                <div class="card-header pt-7">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-gray-800">Recent checkins</span>
                    </h3>
                    <div class="card-toolbar">
                        <a href="#" class="btn btn-sm btn-light">View All</a>
                    </div>
                </div>
                <div class="card-body pt-6">
                    <div class="table-responsive">
                        <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                            <thead>
                            <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                                <th class="p-0 pb-3 min-w-175px text-start">DELEGATE</th>
                                <th class="p-0 pb-3 min-w-175px text-start">ORGANIZATION</th>
                                <th class="p-0 pb-3 min-w-175px text-start">COUNTRY</th>
                                <th class="p-0 pb-3 min-w-175px text-start">EVENT NAME</th>
                                <th class="p-0 pb-3 min-w-100px text-start">CHECKIN</th>
                                <th class="p-0 pb-3 min-w-100px text-start">CHECKIN BY</th>

                                <th class="p-0 pb-3 min-w-175px text-start"></th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($checkins as $checkin)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex justify-content-start flex-column">
                                                <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">
                                                    {{$checkin->delegate->name}}
                                                </a>
                                                <span class="text-gray-400 fw-semibold d-block fs-7">
                                                   {{$checkin->delegate->email}}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-start pe-0">
                                        <span class="text-gray-600 fw-bold fs-6">
                                            {{ $checkin->delegate->organization }}
                                        </span>
                                    </td>
                                    <td class="text-start pe-0">
                                        <span class="text-gray-600 fw-bold fs-6">
                                            {{ $checkin->delegate->country->name }}
                                        </span>
                                    </td>
                                    <td class="text-start pe-0">
                                        <span class="text-gray-600 fw-bold fs-6">
                                            {{$checkin->delegate->event->title}}
                                        </span>
                                    </td>
                                    <td class="text-start pe-0">
                                        <span class="text-gray-600 fw-bold fs-6">
                                            {{ format_date($checkin->created_at, 'd M, y H:i A') }}
                                        </span>
                                    </td>
                                    <td class="text-start pe-0">
                                        <span class="text-gray-600 fw-bold fs-6">
                                            {{ $checkin->scannedby->name }}
                                        </span>
                                    </td>

                                    <td class="text-start pe-0">

                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@push('scripts')
            <!-- Styles -->
            <style>
                #chartdiv {
                    width: 100%;
                    height: 500px;
                }
                #pieChartDiv {
                    width: 100%;
                    height: 500px;
                }
            </style>

            <!-- Resources -->
            <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
            <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
            <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
            @include('pages.dashboards.charts.checkins-barchart')
            @include('pages.dashboards.charts.delegates-checkins-piechart')
@endpush
</x-default-layout>
