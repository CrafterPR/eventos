<div  class="modal fade" id="kt_modal_create_event" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_create_event">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Register an upcoming event</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" aria-label="Close">
                    {!! getIcon('cross','fs-1') !!}
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body px-5 my-7">
                <!--begin::Form-->
                <form id="kt_modal_create_event_form" class="form" action="#" wire:submit.prevent="submit" enctype="multipart/form-data">
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_event_scroll" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Title</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" wire:model="event.title" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="title"/>
                            <!--end::Input-->
                            @error('event.title')
                             <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row fv-row mb-7">
                            <div class="col-md-6">
                               <label class="required fw-semibold fs-6 mb-2">Start date</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                            <input type="text" wire:model="event.start_date" id="startDate"  class="form-control datepicker form-control-solid mb-3 mb-lg-0"/>
                                <!--end::Input-->
                                @error('event.start_date')
                                <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="required fw-semibold fs-6 mb-2">End date</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                            <input type="text" wire:model="event.end_date" id="endDate"  class="form-control datepicker form-control-solid mb-3 mb-lg-0"/>
                                <!--end::Input-->
                                @error('event.end_date')
                                <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                        </div>
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Organization</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" wire:model="event.organization" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Organization"/>
                            <!--end::Input-->
                            @error('event.organization')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <!--end::Input group-->
                          <div  wire:ignore class="fv-row mb-7" >
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Theme of the Event</label>
                              <!--end::Label-->
                              <!--begin::Input-->
                              <textarea wire:model="event.covers" id="create_theme_ckeditor_classic" class="form-control form-control-solid mb-3 mb-lg-0"></textarea>

                              <!--end::Input-->
                              @error('event.theme')
                              <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Venue</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" wire:model="event.venue" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Venue"/>
                            <!--end::Input-->
                            @error('event.venue')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close" wire:loading.attr="disabled">Discard</button>
                        <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                            <span class="indicator-label" wire:loading.remove>Submit</span>
                            <span class="indicator-progress" wire:loading wire:target="submit">
                                Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
@push('scripts')
    <script src="{{ asset('assets//plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>
    <script>
       $(function() {
           ClassicEditor
               .create(document.querySelector('#create_theme_ckeditor_classic'))
               .then(editor => {
                   editor.model.document.on('change:data', () => {
                   @this.set('event.theme', editor.getData())
                   })
               })
               .catch(error => {
                   console.error(error);
               });

           $('#startDate').daterangepicker({
               singleDatePicker: true,
               minDate: moment().add(0, 'days'),
               startDate: moment().add(0, 'days')
           }, function(start) {

               $('#endDate').daterangepicker({
                   singleDatePicker: true,
                   minDate: start,
                   startDate: start.add(0, 'days')
               });
           });


           $('#endDate').daterangepicker({
               singleDatePicker: true,
               minDate: moment().add(0, 'days'),
               startDate: moment().add(0, 'days')
           });
           document.getElementById('kt_modal_create_event_form').addEventListener('submit', function(event) {
               event.preventDefault();

               // Get the selected dates
               let startDate = $('#startDate').data('daterangepicker').startDate.format('YYYY-MM-DD');
               let endDate = $('#endDate').data('daterangepicker').endDate.format('YYYY-MM-DD');

               // Set the dates in Livewire component
           @this.set('event.start_date', startDate);
           @this.set('event.end_date', endDate);

               // Trigger the form submission in Livewire
           @this.call('submit');
           });
       });

      </script>
@endpush
