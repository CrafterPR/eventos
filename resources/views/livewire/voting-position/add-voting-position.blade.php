<div class="modal fade" id="kt_modal_add_position" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-500px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_user_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Create Voting Position</h2>
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
                <form id="kt_modal_add_position_form" class="form" action="#" wire:submit="submit" >
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll"
                         data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                         data-kt-scroll-dependencies="#kt_modal_add_user_header"
                         data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="100%">
                        <!--begin::Input group-->
                        @csrf

                    <div class="row mb-6">
                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <input type="text" wire:model="title"
                                       autocomplete="off"
                                       class="form-control  @error('name') border-danger @enderror "/>
                                <label for="title">
                                    Position Name
                                    <span class="required"></span>
                                </label>
                                @error('title')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <select wire:model="voting_period"
                                        data-control="select2"
                                        id="voting_period"
                                       class="form-select form-control-solid @error('voting_period') border-danger @enderror ">
                                    <option value="">Select</option>
                                    @foreach($this->votingPeriods as $period)
                                        <option value="{{$period->uuid}}">{{$period->name}}</option>
                                    @endforeach
                                </select>
                                <label for="code">
                                    Voting period
                                    <span class="required"></span>
                                </label>
                                @error('voting_period')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" wire:model="code"
                                       autocomplete="off"
                                       class="form-control  @error('code') border-danger @enderror "/>
                                <label for="code">
                                    Position Code
                                    <span class="required"></span>
                                </label>
                                @error('code')
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
@push('scripts')
    <script>
        $(function () {
            $('#kt_modal_add_position').on('submit', function (e) {
                e.preventDefault();
                var data = $('#voting_period').select2("val");
                console.log(data);
                @this.set('voting_period', data);
                    ;
                });

        });

    </script>
@endpush

