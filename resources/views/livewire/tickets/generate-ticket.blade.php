@php use App\Enum\Currency; @endphp
<div  class="modal fade" id="kt_modal_generate_ticket" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_generate_ticket_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Generate Delegate Ticket</h2>
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
                <form id="kt_modal_add_user_form" class="form" action="#" wire:submit="submit">
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_generate_ticket_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Select Delegate</label>
                            <!--end::Label-->
                            <!--begin::Input-->

                            <select  wire:model="orderItem.user_id" class="form-select form-control-solid mb-3 mb-lg-0"  data-control="select2">
                                <option value="">Select delegate</option>
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>

                            <!--end::Input-->
                            @error('orderItem.user_id')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Select ticket</label>
                            <!--end::Label-->
                            <!--begin::Input-->

                            <select  wire:model="orderItem.itemable_id" class="form-select form-control-solid mb-3 mb-lg-0"  data-control="select2">
                                <option value="">Select ticket</option>
                                @foreach($tickets as $ticket)
                                     <option value="{{$ticket->id}}">{{$ticket->title}}</option>
                                @endforeach
                            </select>

                            <!--end::Input-->
                            @error('orderItem.itemable_id')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="fv-row mb-7 row">
                            <!--begin::Label-->
                            <div class="col-md-6">
                               <label class="required fw-semibold fs-6 mb-2">Enter quantity</label>
                                <!--end::Label-->
                                <!--begin::Input-->

                            <input type="number"  wire:model="orderItem.quantity" value="1" class="form-control form-control-solid mb-3 mb-lg-0" />

                                <!--end::Input-->
                                @error('orderItem.quantity')
                                <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6">
                                 <label class="required fw-semibold fs-6 mb-2">Currency</label>
                                <!--end::Label-->
                                <!--begin::Input-->

                            <select   wire:model="orderItem.currency" class="form-control form-control-solid mb-3 mb-lg-0">
                                <option value="">Select</option>
                                <option value="{{Currency::KES->value }}">Kenya Shillings</option>
                                <option value="{{Currency::USD->value }}">US Dollars</option>
                            </select>

                                <!--end::Input-->
                                @error('orderItem.currency')
                                <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

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

