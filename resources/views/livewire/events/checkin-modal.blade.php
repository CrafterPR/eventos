<div wire:modal="showModal" class="modal fade" id="kt_modal_checkin_event" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-450px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Select the  Event to checkin delegate(s)</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" aria-label="Close">
                    {!! getIcon('cross','fs-1') !!}
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 my-7">
                <!--begin::Form-->
                <form id="kt_modal_update_event_form" class="form" action="#" wire:submit="submit">
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_role_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                         data-kt-scroll-dependencies="#kt_modal_update_role_header" data-kt-scroll-wrappers="#kt_modal_update_role_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                            <div class="mb-10">
                                <!--begin::Label-->
                                <label class="fs-5 fw-bold form-label mb-2">
                                    <span class="required">Select the Event:</span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->

                                <select wire:model.live="event_id"
                                        aria-label="Select event"
                                        data-control="select2"
                                        id="event-id"
                                        data-placeholder="Select date..."
                                        class="form-select form-select-solid">
                                    <option value="">Select event</option>
                                    @foreach($events As $event)
                                        <option value="{{ $event->id }}">{{ $event->title }}</option>
                                    @endforeach
                                </select>
                                <!--end::Input-->
                                @error('event_id')
                                <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
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
        const modal = document.querySelector('#kt_modal_checkin_event');
        $('#event-id').on('change', function(e) {
            e.preventDefault();
            let event = $(this).val();
            window.location.href=`/${event}/checkin`;
        });
        modal.addEventListener('closeModal', () => {
            $('#kt_modal_checkin_event').modal('hide');
        });
    </script>
@endpush
