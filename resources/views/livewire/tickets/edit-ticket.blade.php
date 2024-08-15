<div  class="modal fade" id="kt_modal_edit_ticket" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_edit_ticket">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Edit Ticket</h2>
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
                <form id="kt_modal_add_user_form" class="form" action="#" wire:submit="submit" enctype="multipart/form-data">
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Title</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" wire:model="ticket.title" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="title"/>
                            <!--end::Input-->
                            @error('ticket.title')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->

                        <div class="row fv-row mb-7">
                            <div class="col-md-6">
                               <label class="required fw-semibold fs-6 mb-2">Days</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                            <input type="text" wire:model="ticket.days"  class="form-control form-control-solid mb-3 mb-lg-0"/>
                                <!--end::Input-->
                                @error('ticket.days')
                                <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="required fw-semibold fs-6 mb-2">Persons</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                            <input type="text" wire:model="ticket.persons"  class="form-control form-control-solid mb-3 mb-lg-0"/>
                                <!--end::Input-->
                                @error('ticket.persons')
                                <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                        </div>

                        <div class="row fv-row mb-7">
                            <div class="col-md-6">
                               <label class="required fw-semibold fs-6 mb-2">KES Amount</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                            <input type="text" wire:model="ticket.kes_amount"  class="form-control form-control-solid mb-3 mb-lg-0"/>
                                <!--end::Input-->
                                @error('ticket.kes_amount')
                                <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="required fw-semibold fs-6 mb-2">USD Amount</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                            <input type="text" wire:model="ticket.usd_amount"  class="form-control form-control-solid mb-3 mb-lg-0"/>
                                <!--end::Input-->
                                @error('ticket.usd_amount')
                                <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                        </div>
                        <!--end::Input group-->
                          <div  wire:ignore class="fv-row mb-7" >
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Covers</label>
                              <!--end::Label-->
                              <!--begin::Input-->
                              <textarea wire:model="ticket.covers" id="description_ckeditor_classic" name="covers" class="form-control form-control-solid mb-3 mb-lg-0">
                                    {{ $ticket->covers }}
                              </textarea>
                              <!--end::Input-->
                              @error('ticket.covers')
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

{{--@push('scripts')--}}
    <script src="{{ asset('assets//plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>
    <script>
          ClassicEditor
              .create(document.querySelector('#description_ckeditor_classic'))
              .then(editor => {
                  editor.model.document.on('change:data', () => {
                  @this.set('ticket.covers', editor.getData());
              })
              })
              .catch(error => {
                  console.error(error);
              });

      </script>
{{--@endpush--}}