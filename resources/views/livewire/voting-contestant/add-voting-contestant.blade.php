<div class="modal fade" id="kt_modal_add_contestant" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-500px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_user_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Add contestant</h2>
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
                        <div class="col-md-8">
                            <div class="form-floating mb-3">
                                <input type="text" wire:model.live="full_name"
                                       autocomplete="off"
                                       placeholder="e.g Dr. James Mwali Makau, E.G.H"
                                       class="form-control  @error('full_name') border-danger @enderror "/>
                                <label for="full_name">
                                    Full Name of contestant
                                    <span class="required"></span>
                                </label>
                                @error('full_name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                         <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <input type="text" wire:model.live="unique_code"
                                       autocomplete="off"
                                       maxlength="2"
                                       placeholder="e.g 1"
                                       class="form-control  @error('unique_code') border-danger @enderror "/>
                                <label for="unique_code">
                                    Contestant code
                                    <span class="required"></span>
                                </label>
                                @error('unique_code')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                        <div class="row mb-6">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select wire:model.live="period"
                                            data-control="select2"
                                            id="period"
                                            class="form-select form-control-solid @error('period') border-danger @enderror ">
                                        <option value="">Select</option>
                                        @foreach($this->votingPeriods as $period)
                                            <option value="{{$period->uuid}}">{{$period->name}}</option>
                                        @endforeach
                                    </select>
                                    <label for="code">
                                        Voting period
                                        <span class="required"></span>
                                    </label>
                                    @error('period')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select wire:model.live="position"
                                            data-control="select2"
                                            id="position"
                                            class="form-select form-control-solid @error('position') border-danger @enderror ">
                                        <option value="">Select</option>
                                        @foreach($this->votingPositions as $position)
                                            <option value="{{$position->uuid}}">{{$position->title}}</option>
                                        @endforeach

                                    </select>
                                    <label for="position">
                                        Voting position
                                        <span class="required"></span>
                                    </label>
                                    @error('position')
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

            $('#period').on('change', function(e) {
                e.preventDefault();
                let period = $(this).val();
                Livewire.dispatch('get-positions', { uuid: period})
            });

            $("#kt_modal_add_contestant").on('submit', function(e) {
                // Prevent the default form submission behavior
                e.preventDefault();
                var period = $("#period").val();
                var position = $("#position").val();
                @this.set('period', period);
                @this.set('position', position);
        });

        });

    </script>
@endpush

