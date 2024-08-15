<div class="modal fade" id="kt_modal_reserve_booth" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_reserve_booth">
                <h2 class="fw-bold">Reserve Booth - #{{$booth->label}}</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" aria-label="Close">
                    {!! getIcon('cross','fs-1') !!}
                </div>
            </div>
            <div class="modal-body px-5 my-7">
                <form id="kt_modal_reserve_booth_form" class="form" wire:submit="submit">
                    <div class="d-flex flex-column scroll-y px-5 px-lg-5" id="kt_modal_add_coupon_scroll"
                         data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                         data-kt-scroll-dependencies="#kt_modal_reserve_booth_header"
                         data-kt-scroll-wrappers="#kt_modal_reserve_booth_scroll" data-kt-scroll-offset="300px">
                        <div class="fv-row mb-2 row">
                        <div class="col-md-8">
                            <label class="required fw-semibold fs-6 mb-2">Exhibitor Email </label>
                            <input type="email" wire:model="email" placeholder="Enter exhibitor email"
                                   class="form-control form-control-solid mb-3 mb-lg-0"/>
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <br />
                            <button type="button" wire:click="searchUser" class="btn btn-info btn-sm"
                                    wire:loading.attr="disabled">
                                Search Exhibitor
                            </button>
                        </div>
                        </div>
                        <div class="fv-row mb-7 row">
                            <div class="col-md-6">
                                <label class="required fw-semibold fs-6 mb-2">First Name</label>
                                <input type="text" wire:model="firstname"
                                       class="form-control form-control-solid mb-3 mb-lg-0"/>
                                @error('firstname')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="fw-semibold fs-6 mb-2">Last Name</label>
                                <input type="text" wire:model="lastname"
                                       class="form-control form-control-solid mb-3 mb-lg-0  @error('lastname') border-danger @enderror"/>
                                @error('lastname')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="fv-row mb-7 row">
                            <div class="col-md-6">
                                <label class="fw-semibold fs-6 mb-2">Mobile</label>
                                <input type="text" wire:model="mobile"
                                       class="form-control form-control-solid mb-3 mb-lg-0  @error('mobile') border-danger @enderror"/>
                                @error('mobile')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="required fw-semibold fs-6 mb-2">Institution</label>
                                <input type="text" wire:model="institution"
                                       class="form-control form-control-solid mb-3 mb-lg-0"/>
                                @error('institution')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="fv-row mb-7 row">
                            <div class="col-md-4">
                                <label class="fw-semibold fs-6 mb-2">Send Proforma Invoice?</label>
                                <br />
                                <input  type="checkbox" value="1" wire:model="send_invoice" id="send_invoice"
                                        class="@error('send_invoice') border-danger @enderror" />
                                @error('send_invoice')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-8">
                                <label class="fw-semibold fs-6 mb-2">Notes</label>
                                <textarea type="text" wire:model="notes"
                                       class="form-control form-control-solid mb-3 mb-lg-0">
                                </textarea>
                                @error('notes')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center pt-15">
                            <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close"
                                    wire:loading.attr="disabled">Discard
                            </button>
                            <button type="submit" class="btn btn-primary" data-kt-coupons-modal-action="submit">
                                <span class="indicator-label" wire:loading.remove>Submit</span>
                                <span class="indicator-progress" wire:loading wire:target="submit">
                                Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
