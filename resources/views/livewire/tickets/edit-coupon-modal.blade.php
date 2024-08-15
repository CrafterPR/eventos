<div class="modal fade" id="kt_modal_incdec_coupon" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-600px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_incdec_coupon">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Increase/Decrease coupon capacity</h2>
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
                <form id="kt_modal_incdec_coupon_form" class="form" action="#" wire:submit="submit"
                      enctype="multipart/form-data">
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll"
                         data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                         data-kt-scroll-dependencies="#kt_modal_incdec_coupon_header"
                         data-kt-scroll-wrappers="#kt_modal_incdec_coupon_scroll" data-kt-scroll-offset="100%">
                        <!--begin::Input group-->
                        @csrf

                        <div class="col-md-8">
                            <div class="form-floating mb-3">
                                <input type="number" wire:model="coupon.no_of_delegates" autocomplete="off"
                                       class="form-control   @error('coupon.no_of_delegates') border-danger @enderror"/>
                                <label for="code">
                                   No of delegates
                                    <span class="required"></span>
                                </label>
                                @error('coupon.no_of_delegates')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-floating mb-3">
                                <textarea  wire:model="reason" autocomplete="off"
                                       class="form-control   @error('reason') border-danger @enderror">
                                </textarea>
                                <label for="code">
                                   Reason for change
                                    <span class="required"></span>
                                </label>
                                @error('reason')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>
                        <div class="text-center pt-15">
                            <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close"
                                    wire:loading.attr="disabled">Discard
                            </button>
                            <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                <span class="indicator-label" wire:loading.remove>Update</span>
                                <span class="indicator-progress" wire:loading wire:target="submit">
                                Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                            </button>
                        </div>
            </form>
        </div>
    </div>
</div>
</div>

