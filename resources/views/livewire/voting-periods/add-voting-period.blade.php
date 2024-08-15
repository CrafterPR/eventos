<div class="modal fade" id="kt_modal_add_period" data-bs-focus="false" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-500px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_user_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Add Voting Period</h2>
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
                        <div class="col-md-7">
                            <div class="form-floating mb-3">
                                <input type="text" wire:model="name"
                                       autocomplete="off"
                                       class="form-control  @error('name') border-danger @enderror "/>
                                <label for="name">
                                    Election Tag/Name
                                    <span class="required"></span>
                                </label>
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div  class="col-md-5">
                            <div wire:ignore class="form-floating mb-3">
                                <input type="text" wire:model="election_date" id="kt_daterangepicker"
                                       class="form-control @error('election_date') border-danger @enderror "/>
                                <label for="election_date">
                                    Election date
                                    <span class="required"></span>
                                </label>
                                @error('election_date')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="row mb-6">
                        <div  class="col-md-6">
                            <div wire:ignore class="form-floating mb-3">
                                <input type="text" wire:model="starts_at" id="starts_at_picker"
                                       class="form-control @error('starts_at') border-danger @enderror "/>
                                <label for="starts_at">
                                    Start at (time)
                                    <span class="required"></span>
                                </label>
                                @error('starts_at')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div  class="col-md-6">
                            <div wire:ignore class="form-floating mb-3">
                                <input type="text" wire:model="ends_at" id="ends_at_picker"
                                       class="form-control @error('ends_at') border-danger @enderror "/>
                                <label for="ends_at">
                                    Ends at (time)
                                    <span class="required"></span>
                                </label>
                                @error('ends_at')
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

            $("#kt_daterangepicker").flatpickr({
                minDate: "today",
            });

            $("#starts_at_picker,#ends_at_picker").flatpickr({
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true
            });

            $("#kt_modal_add_period_form").on('submit', function(e) {
                // Prevent the default form submission behavior
                e.preventDefault();
                var election_date = $("#kt_daterangepicker").val();
                var starts_at = $("#starts_at_picker").val();
                var ends_at = $("#ends_at_picker").val();

            @this.set('election_date', election_date);
            @this.set('starts_at', starts_at);
            @this.set('ends_at', ends_at);
        });

        });

    </script>
@endpush

