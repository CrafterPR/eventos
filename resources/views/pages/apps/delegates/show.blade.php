<x-default-layout>

    @section('title')
        Delegate
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('users.delegates.show', $delegate) }}
    @endsection

    <!--begin::Layout-->
    <div class="d-flex flex-column flex-lg-row">
        <!--begin::Sidebar-->
        <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">
            <!--begin::Card-->
            <div class="card mb-5 mb-xl-8">
                <!--begin::Card body-->
                <div class="card-body">
                    <!--begin::Summary-->
                    <!--begin::User Info-->
                    <div class="d-flex flex-center flex-column py-5">
                        <!--begin::Avatar-->
                        <div class="symbol symbol-100px symbol-circle mb-7">
                            @if($delegate->profile_photo_url)
                                <img src="{{ $delegate->profile_photo_url }}" alt="image"/>
                            @else
                                <div class="symbol-label fs-3 {{ app(\App\Actions\GetThemeType::class)->handle('bg-light-? text-?', $delegate->name) }}">
                                    {{ substr($delegate->first_name, 0, 1) }}{{ substr($delegate->last_name, 0, 1) }}
                                </div>
                            @endif
                        </div>
                        <!--end::Avatar-->
                        <!--begin::Name-->
                        <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-3">{{ $delegate->salutation }} {{ $delegate->first_name }} {{ $delegate->last_name }}</a>
                        <!--end::Name-->
                        <!--begin::Position-->
                        <div class="mb-9">
                            <div class="badge badge-lg badge-light-primary d-inline">{{ ucwords($delegate->category->title) }}</div>
                        </div>

                    </div>
                    <!--end::User Info-->
                    <!--end::Summary-->
                    <!--begin::Details toggle-->
                    <div class="d-flex flex-stack fs-4 py-3">
                        <div class="fw-bold rotate"  role="button" aria-expanded="false" aria-controls="kt_user_view_details">Delegate's Details
                        </div>
                        @can('edit-delegate')
                            <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit delegate details">
                                <a href="#" class="btn btn-sm btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_delegate">Edit details</a>
                            </span>
                        @endcan
                    </div>
                    <!--end::Details toggle-->
                    <div class="separator"></div>
                    <!--begin::Details content-->
                    <div id="kt_user_view_details" class="collapse show">
                        <div class="pb-5 fs-6">
                            <!--begin::Details item-->
                            <div class="fw-bold mt-5">Account ID</div>
                            <div class="text-gray-600">{{ Str::upper($delegate->id) }}</div>
                            <div class="fw-bold mt-5">Email Address</div>
                            <div class="text-gray-600">
                                <a href="#" class="text-gray-600 text-hover-primary">{{ $delegate->email }}</a>
                            </div>
                            <!--begin::Details item-->
                            <!--begin::Details item-->
                            <div class="fw-bold mt-5">Mobile Phone</div>
                            <div class="text-gray-600">
                                {{ $delegate->mobile }}
                            </div>
                            <div class="fw-bold mt-5">Organization</div>
                            <div class="text-gray-600">
                                <a href="#" class="text-gray-600 text-hover-primary">{{ $delegate->organization }}</a>
                            </div>
                            <div class="fw-bold mt-5">Country</div>
                            <div class="text-gray-600">
                                <a href="#" class="text-gray-600 text-hover-primary">{{ $delegate->country->name }}</a>
                            </div>
                            <div class="fw-bold mt-5">Event</div>
                            <div class="text-gray-600">
                                <a href="#" class="text-gray-600 text-hover-primary">{{ $delegate->event->title }}</a>
                            </div>
                        </div>
                    </div>
                    <!--end::Details content-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->

        </div>
        <!--end::Sidebar-->
        <!--begin::Content-->
        <div class="flex-lg-row-fluid ms-lg-15">
            <!--begin:::Tabs-->
            <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8">
                <!--begin:::Tab item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_user_view_overview_tab">Delegate Checkin Logs</a>
                </li>
                <!--end:::Tab item-->

                <li class="nav-item ms-auto">
                    <!--begin::Action menu-->
                    <a href="#" class="btn btn-primary ps-7" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">Actions
                        <i class="ki-duotone ki-down fs-2 me-0"></i></a>
                    <!--begin::Menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold py-4 w-250px fs-6" data-kt-menu="true">
                        <!--begin::Menu item-->
                        <div class="menu-item px-5">
                            <div class="menu-content text-muted pb-2 px-5 fs-7 text-uppercase">Reports</div>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5">
                            <a href="#" class="menu-link flex-stack px-5">Send report (Email)
                                <span class="ms-2" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference">
                                    <i class="ki-duotone ki-rocket fs-2qx">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span></a>
                        </div>
                        <div class="menu-item px-5">
                            <a href="#" class="menu-link text-danger px-5" data-kt-delegate-id="{{ $delegate->id }}" data-kt-action="delete_delegate">
                                Delete delegate
                            </a>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::Menu-->
                    <!--end::Menu-->
                </li>
                <!--end:::Tab item-->
            </ul>
            <!--end:::Tabs-->
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
                                <h2 class="mb-1">{{$delegate->name }}'s Checkin</h2>

                            </div>

                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body p-9 pt-4">
                            <!--begin::Dates-->
                            <ul class="nav nav-pills d-flex flex-nowrap hover-scroll-x py-2">
                                @php
                                    $dates = getDatesBetween($delegate->event->start_date, $delegate->event->end_date);
                                @endphp
                                    <!--begin::Date-->
                                @foreach($dates as $index => $date)
                                    <li class="nav-item me-1">
                                        <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-40px me-2 py-4 {{ $index === 0 ? 'active btn-active-primary' : ''}}" data-bs-toggle="tab" href="#{{md5($date)}}">
                                            <span class="opacity-50 fs-7 fw-semibold">{{ (new DateTime($date))->format('D') }}</span>
                                            <span class="fs-6 fw-bolder">{{ (new DateTime($date))->format('d,M') }}</span>
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                            <div class="tab-content">
                            @foreach($dates as $index => $date)
                                <div id="{{md5($date)}}" class="tab-pane fade {{ $index === 0 ? 'active show' : '' }} ">
                                    <!--begin::Time-->
                                    @foreach($delegate->event->checkpoints as $checkpoint)
                                        <div class="d-flex flex-stack position-relative mt-6">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                            <!--end::Bar-->
                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5">
                                                <!--begin::Time-->
                                                <div class="fs-7 mb-1">07:00 - 05:00
                                                    <span class="fs-7 text-muted text-uppercase">pm</span>
                                                </div>
                                                <!--end::Time-->
                                                <!--begin::Title-->
                                                <a href="#" class="fs-5 fw-bold text-dark text-hover-primary mb-2">{{ $checkpoint->name }}</a>
                                                <!--end::Title-->
                                                <!--begin::User-->
                                                <div class="fs-7 text-muted">

                                                </div>
                                                <div class="border border-gray-300 border-dashed rounded py-3 px-3 mx-4 mb-3">
                                                    @forelse($checkpoint->checkins()->where('delegate_id', $delegate->id)
                                                            ->whereDate('created_at', (new DateTime($date))->format('Y-m-d'))->get() as $checkin)
                                                        <div class="fs-7 mb-1">{{ $checkpoint->is_gift_checkpoint ? 'Collected at ' : 'Checked in at' }} {{ format_date($checkin->created_at , 'H:i') }}
                                                            <span class="fs-7 text-muted text-uppercase">{{ format_date($checkin->created_at , 'A') }}</span>
                                                        </div>
                                                    @empty
                                                        <div class="fs-7 mb-1">{{ $checkpoint->is_gift_checkpoint ? 'Not collected' : 'Not checked in'}}
                                                            <span class="fs-7 text-muted text-uppercase"></span>
                                                        </div>
                                                    @endforelse
                                                </div>
                                            </div>
                                            <!--end::Info-->
                                            <!--begin::Action-->
                                            <!--end::Action-->
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

                </div>
                <!--end:::Tab pane-->
                <!--begin:::Tab pane-->

            </div>
            <!--end:::Tab content-->
        </div>
        <!--end::Content-->
    </div>
    <livewire:delegate.edit-delegate-modal :delegate="$delegate" />

</x-default-layout>

@push('scripts')
  <script>
      KTMenu.init();
      document.addEventListener('livewire:init', function () {
          Livewire.on('success', function () {
              $('#kt_modal_edit_delegate').modal('hide');
          });
      });

      document.addEventListener('livewire:load', function () {
          const deleteButton = document.querySelector('[data-kt-action="delete_delegate"]');
          if (deleteButton) {
              deleteButton.addEventListener('click', function (e) {
                  e.preventDefault();
                  console.log("delegate:", this.getAttribute('data-kt-delegate-id'));
                  Swal.fire({
                      text: 'Are you sure you want to delete this delegate?',
                      icon: 'warning',
                      buttonsStyling: false,
                      showCancelButton: true,
                      confirmButtonText: 'Yes',
                      cancelButtonText: 'No',
                      customClass: {
                          confirmButton: 'btn btn-danger',
                          cancelButton: 'btn btn-secondary',
                      }
                  }).then((result) => {
                      if (result.isConfirmed) {
                          Livewire.dispatch('delete_delegate', {'delegate' : this.getAttribute('data-kt-delegate-id')});
                      }
                  });
              });
          }
      });


  </script>
@endpush
