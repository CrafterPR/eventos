<div class="modal fade" id="kt_modal_add_voter" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_user_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Add Voter</h2>
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
                <form id="kt_modal_add_period_form" class="form" action="#" wire:submit="submit" >
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll"
                         data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                         data-kt-scroll-dependencies="#kt_modal_add_user_header"
                         data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="100%">
                        <!--begin::Input group-->
                        @csrf

                    <div class="row mb-6">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" wire:model.live="first_name"
                                       autocomplete="off"
                                       placeholder="e.g James"
                                       class="form-control  @error('first_name') border-danger @enderror "/>
                                <label for="first_name">
                                    First name of the Voter
                                    <span class="required"></span>
                                </label>
                                @error('first_name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-floating mb-3">
                                 <input type="text" wire:model.live="last_name"
                                        autocomplete="off"
                                        placeholder="e.g James"
                                        class="form-control  @error('last_name') border-danger @enderror "/>
                                <label for="last_name">
                                    Last name of the Voter
                                    <span class="required"></span>
                                </label>
                                @error('last_name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" wire:model.live="mobile"
                                       autocomplete="off"
                                       placeholder="e.g 0722123456"
                                       class="form-control  @error('mobile') border-danger @enderror "/>
                                <label for="mobile">
                                    Mobile number (Used for voting)
                                    <span class="required"></span>
                                </label>
                                @error('mobile')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-floating mb-3">
                                 <input type="text" wire:model.live="email"
                                        autocomplete="off"
                                        placeholder="e.g james@vote.com"
                                        class="form-control  @error('email') border-danger @enderror "/>
                                <label for="last_name">
                                    Email (Optional)
                                </label>
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>


                        <!--end::Scroll-->
                        <!--begin::Actions-->
                        <div class="text-center pt-15">
                            <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close"
                                    wire:loading.attr="disabled">Discard
                            </button>
                            <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                <span class="indicator-label" wire:loading.remove>Submit</span>
                                <span class="indicator-progress" wire:loading wire:target="submit">
                                Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>


