@php use App\Enum\Currency; @endphp
<div  class="modal fade" id="kt_modal_add_coupon" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_coupon_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Generate Coupons</h2>
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
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_coupon_scroll" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_coupon_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->

                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                               <label class="required fw-semibold fs-6 mb-2">Organization / Delegate </label>
                                <!--end::Label-->
                                <!--begin::Input-->

                            <input type="text"  wire:model="coupon.organization" class="form-control form-control-solid mb-3 mb-lg-0" />

                                <!--end::Input-->
                                @error('coupon.organization')
                                <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="fv-row mb-7 row">
                            <div class="col-md-6">
                                <label class="required fw-semibold fs-6 mb-2">No of delegates</label>

                                <input type="text"  wire:model="coupon.no_of_delegates" class="form-control form-control-solid mb-3 mb-lg-0" />

                                <!--end::Input-->
                                @error('coupon.no_of_delegates')
                                <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6">
                            <label class="fw-semibold fs-6 mb-2">Coupon category</label>

                               <select wire:model="coupon.category_id" id="select_category_id" class="form-select custom-select2 @error('coupon.category_id') border-danger @enderror" data-control="select2"
                                       data-placeholder="Select category">
                                    <option value=""></option>
                                   @foreach($categories as $category)
                                       <option value="{{ $category->id }}" @selected(old('coupon.category_id') == $category->name) >
                                        {{$category->name }}
                                        </option>
                                   @endforeach
                                </select>  <!--end::Input-->
                                @error('coupon.category_id')
                                <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                    </div>
                        <div class="fv-row mb-7 row">
                            <div class="col-md-4">
                               <label class="required fw-semibold fs-6 mb-2">Contact email</label>

                                <input type="text"  wire:model="coupon.email" value="1" class="form-control form-control-solid mb-3 mb-lg-0" />

                                <!--end::Input-->
                                @error('coupon.email')
                                <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-4">
                               <label class="required fw-semibold fs-6 mb-2">No of days</label>
                                <select wire:model="coupon.days" id="select_days" class="form-select custom-select2 @error('coupon.days') border-danger @enderror" data-control="select2"
                                        data-placeholder="Select days">
                                    <option value=""></option>
                                    @foreach (config("setting.coupon_type") as $days)
                                        <option value="{{ $days }}" @selected(old('coupon.days') == $days)>
                                        {{$days}}
                                        </option>
                                    @endforeach
                                </select>

                                <!--end::Input-->
                                @error('coupon.type')
                                <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-4">
                               <label class="required fw-semibold fs-6 mb-2">Ticket type</label>
                                <select wire:model="coupon.type_id" id="select_type_id" class="form-select custom-select2 @error('coupon.type_id') border-danger @enderror" data-control="select2"
                                        data-placeholder="Select type">
                                    <option value=""></option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}" @selected(old('coupon.type_id') == $type)>
                                        {{$type->title}}
                                        </option>
                                    @endforeach
                                </select>

                                <!--end::Input-->
                                @error('coupon.type')
                                <span class="text-danger">{{ $message }}</span> @enderror
                            </div>


                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close" wire:loading.attr="disabled">Discard</button>
                        <button type="submit" class="btn btn-primary" data-kt-coupons-modal-action="submit">
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

@push('scripts')
    <script>
        $(function () {
            let selectOptions = ['days', 'category_id', 'type_id'];

            selectOptions.map(function (option) {
                $(`#select_${option}`).on('change', function (e) {
                    var data = $(`#select_${option}`).select2("val");
                @this.set(`coupon.${option}`, data);
                    ;
                });
            });
        });

    </script>
@endpush


