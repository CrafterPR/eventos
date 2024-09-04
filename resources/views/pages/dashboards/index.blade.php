@php use App\Models\User; @endphp
@php(extract($data))

<x-default-layout>
    @section('title')
        Dashboard
    @endsection

    @can('view-quick-links')
        <div class="row g-5 g-xl-10 m-5 mb-xl-10">
            <div class="row">
                <!-- Dashboard Quick Links -->
                <div class="col-12">
                    <h4 class="mb-3">Quick Links</h4>
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
        <div class="row">
            <div class="col-md-8 card card-flush h-md-100 mr-2">
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
