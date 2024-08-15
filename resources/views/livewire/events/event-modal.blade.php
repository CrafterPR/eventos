<div wire:modal="showModal" class="modal fade" id="kt_modal_update_event" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-750px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">View / Update Event</h2>
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
                        <div class="fv-row mb-6">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bold form-label mb-2">
                                <span class="required">Event title</span>
                            </label>
                            <!--end::Label-->

                            <input class="form-control form-control-solid"  wire:model="event.title"/>
                            <!--end::Input-->
                            @error('event.title')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="row">
                        <div class="col-mb-6 mb-6">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bold form-label mb-2">
                                <span class="required">Start</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->

                            <input class="form-control form-control-solid"  wire:model.live="event.start"/>
                            <!--end::Input-->
                            @error('event.start')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-mb-6 mb-6">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bold form-label mb-2">
                                <span class="required">End time</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->

                            <input class="form-control form-control-solid"  wire:model="event.end"/>
                            <!--end::Input-->
                            @error('event.end')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        </div>
                        <div class="row">
                        <div class="mb-10 col-md-6">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bold form-label mb-2">
                                <span class="required">Event Day</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->

                            <select wire:model.live="event.programme_id"
                                    aria-label="Select day"
                                    data-control="select2"
                                    data-placeholder="Select date..."
                                    class="form-select form-select-solid">
                                <option value="">Select day</option>
                                @foreach($programmes As $prog)
                                    <option value="{{ $prog->id }}" @if($event?->programme_id == $prog->id) selected @endif>{{ $prog->title }} - {{ format_time($prog->date, 'dS, M') }}</option>
                                @endforeach
                                </select>
                            <!--end::Input-->
                            @error('event.programme_id')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-10 col-md-6">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bold form-label mb-2">
                                <span class="required">Speaker</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->

                            <select wire:model="event.speaker_id"
                                    aria-label="Select speaker"
                                    data-control="select2"
                                    data-placeholder="Select speaker..."
                                    class="form-select form-select-solid">
                                <option value="">Select speaker</option>
                                @foreach($speakers As $speaker)
                                    <option value="{{ $speaker->id }}" @if($event?->speaker_id == $speaker->id) selected @endif>{{ $speaker->name }}</option>
                                @endforeach
                                </select>
                            <!--end::Input-->
                            @error('event.speaker_id')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                            </div>
                        <!--end::Input group-->

                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close" wire:loading.attr="disabled">Discard</button>
                        <button type="submit" class="btn btn-primary">
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

@push('scripts')
    <script>
        const modal = document.querySelector('#kt_modal_update_event');

        modal.addEventListener('show.bs.modal', (e) => {
            Livewire.emit('modal.show.event_name', e.relatedTarget.getAttribute('data-role-id'));
        });

        modal.addEventListener('closeModal', () => {
            $('#kt_modal_update_event').modal('hide');
        });
    </script>
@endpush
