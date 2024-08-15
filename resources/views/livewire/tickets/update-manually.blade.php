<div  class="modal fade" id="kt_modal_update_purchase" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_edit_ticket">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Update ticket purchase manually</h2>
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
                <form id="kt_modal_update_ticket_form" class="form" action="#" wire:submit="submit" enctype="multipart/form-data">
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_update_ticket_scroll" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7 row">
                            <div class="col-md-6">
                              <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Payment Ref:</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                            <input type="text" wire:model="ticketPayment.reference" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Payment reference"/>
                                <!--end::Input-->
                                @error('ticketPayment.reference')
                                <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6">
                              <!--begin::Input group-->
                                   <label class="required fw-semibold fs-6 mb-2">Mode of Payment(RTGS, EFT, BANK etc.)</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                <input type="text" wire:model="ticketPayment.mode"  class="form-control form-control-solid mb-3 mb-lg-0"/>
                                    <!--end::Input-->
                                    @error('ticketPayment.mode')
                                    <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                            </div>

                        </div>
                    <div class="fv-row mb-7 row">
                        <div class="col-md-8 col-md-offset-2">
                              <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Paid by</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                            <input type="text" wire:model="ticketPayment.paid_by" value="{{$this->ticketPayment?->user?->name}}" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Paid by"/>
                                <!--end::Input-->
                                @error('ticketPayment.paid_by')
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

