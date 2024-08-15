<x-default-layout>

    @section('title')
        Programme
    @endsection



    <!--begin::Layout-->
    <div class="d-flex flex-column flex-lg-row">

        <!--begin::Content-->
        <div class="flex-lg-row-fluid ms-lg-15">
            <!--begin:::Tab content-->
            <div class="tab-content" id="myTabContent">
                <!--begin:::Tab pane-->
                <div class="tab-pane fade show active" id="kt_user_view_overview_tab" role="tabpanel">
                    <!--begin::Card-->
                    <div class="card card-flush mb-6 mb-xl-9">
                        <!--begin::Card header-->
                        <div class="card-header mt-6">
                            <!--begin::Card title-->
                            <div class="card-title flex-column">
                                <h2 class="mb-1">Event Schedule</h2>
                            </div>
                            <!--end::Card title-->

                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body p-9 pt-4">
                            <!--begin::Dates-->
                            <ul class="nav nav-pills d-flex flex-nowrap hover-scroll-x py-2">
                                <!--begin::Date-->
                                @foreach($days as $day)

                                    <li class="nav-item me-1">
                                        <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-40px me-2 py-4 btn-active-primary {{ $day->id == 1 ? 'active' : '' }}"
                                           data-bs-toggle="tab" href="#kt_schedule_day_{{$day->id}}">
                                            <span class="opacity-50 fs-7 fw-semibold">{{ \Carbon\Carbon::parse($day->date)->format('M')  }}</span>
                                            <span class="fs-6 fw-bolder">{{ \Carbon\Carbon::parse($day->date)->format('dS') }}</span>
                                        </a>
                                    </li>
                                @endforeach
                                <!--end::Date-->

                            </ul>
                            <!--end::Dates-->
                            <!--begin::Tab Content-->
                            <div class="tab-content">
                                @foreach($days as $day)
                                    <div id="kt_schedule_day_{{ $day->id }}"
                                         class="tab-pane show {{ $day->id == 1 ? 'active' : '' }}">
                                    <!--begin::Time-->
                                        @foreach($day->events as $event)
                                            <div class="d-flex flex-stack position-relative mt-6">
                                        <!--begin::Bar-->
                                        <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                                <!--end::Bar-->
                                                <!--begin::Info-->
                                        <div class="fw-semibold ms-5">
                                            <!--begin::Time-->
                                            <div class="fs-7 mb-1">{{ format_time($event->start) }} -
                                                {{ format_time($event->end) }}
                                                <span class="fs-7 text-muted text-uppercase"></span>
                                            </div>
                                            <!--end::Time-->
                                            <!--begin::Title-->
                                            <a href="#"
                                               class="fs-5 fw-bold text-dark text-hover-primary mb-2">{{ $event->title }}</a>
                                            <!--end::Title-->
                                            <!--begin::User-->
                                            <div class="fs-7 text-muted">
                                                @if($event->speaker)
                                                    <a href="#">{{$event->speaker->name}}</a>
                                                @else
                                                    <span class="text-active-danger text-muted">Speaker not assigned</span>
                                                @endif
                                            </div>
                                            <!--end::User-->
                                        </div>
                                                <!--end::Info-->
                                                <!--begin::Action-->
                                         <div class="card-footer flex-wrap pt-0">
                                            <button type="button" class="btn btn-sm btn-light btn-active-light-primary my-1"
                                                    data-role-id="{{ $event->id }}" data-bs-toggle="modal"
                                                    data-bs-target="#kt_modal_update_event">Modify Event</button>
                                        </div>
                                    </div>
                                        @endforeach


                                </div>
                                @endforeach

                            </div>
                            <!--end::Tab Content-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                    <!--begin::Tasks-->

                    <!--end::Tasks-->
                </div>


            </div>
            <!--end:::Tab content-->
        </div>
        <!--end::Content-->
    </div>
    <livewire:events.event-modal></livewire:events.event-modal>
        <!--end::Modal-->
</x-default-layout>
