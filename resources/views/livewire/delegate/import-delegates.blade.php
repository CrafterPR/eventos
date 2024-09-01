<div class="modal fade" id="kt_modal_import_delegates" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_redeem_coupon">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Import delegates</h2>
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
                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-6">
                        <div class="card-header">
                            <h5>{{ __('Upload Registered Delegates') }}</h5>
                        </div>
                    </div>
                    <!--end::Card header-->

                    <!--begin::Card body-->
                    <div class="card-body py-4">
                        <!--begin::Table-->
                        {{-- show if loading takes longer than 1000ms --}}
                        <div class="card my-3">
                            <div class="card-header">
                                <h5>{{ __('To upload delegates, follow these steps:') }}</h5>

                            </div>
                            <div class="card-body mb-20 pt-0">
                                <div class="row">
                                    <div class="form-group">
                                        <p class="text-sm mb-2">{{ __('1. Download the excel template below:') }} <i
                                                class="text-danger">*</i></p>
                                        <a href="{{ url('assets/files/delegates_template.xlsx') }}"
                                           class="btn btn-icon btn-3 btn-outline-secondary mb-0">
                                            <img src="/assets/files/excel.png" height="50" width="45"/>
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <p class="text-sm mb-2">{{ __("2. Fill in delegates data in the excel document as shown:") }}
                                            <i class="text-danger">*</i></p>
                                        <img class="img-fluid border-radius-lg"
                                             src="{{ asset('assets/files/delegates_template.png') }}"
                                             alt="excel-example">
                                    </div>
                                </div>
                                <div class="row">
                                    <p class="text-sm mb-2">{{ __("3. Save the excel document, upload and submit.")}}<i
                                            class="text-danger">*</i></p>

                                        <form wire:submit.prevent="uploadDelegates">
                                            @csrf
                                            <div class="d-md-flex justify-content-start">
                                                <div class="form-group">
                                                    <input type="file" id="file-upload-{{ $fileIteration }}"
                                                           accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                                                           class="w-100 form-control @error('importFile') is-invalid @enderror"
                                                           @disabled($isImporting && !$importFinished)
                                                           wire:model="importFile">
                                                    @error('importFile') <span
                                                        class="text-danger">{{ $message }}</span> @enderror
                                                </div>

                                        <button type="submit" @disabled($isImporting &&!$importFinished) class="btn btn-primary" data-kt-delegates-modal-action="importFile">
                                            <span class="indicator-label" wire:loading.remove>Submit</span>
                                            <span class="indicator-progress" wire:loading wire:target="submit">
                                Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                                        </button>
                                            </div>
                                        </form>

                                        @if($isImporting && !$importFinished)
                                            <div wire:poll="updateImportProgress">
                                                Please wait. ...importing <span class="spinner-border spinner-border-sm"
                                                                                role="status" aria-hidden="true"></span>
                                            </div>
                                        @endif

                                        <div id="importStatusMsg" style="scroll-margin-top: 5rem">
                                            @if($importFinished && !$importCancelled)

                                            @endif

                                            @if ($importCancelled)
                                                <p class="text-danger">{{ __('Unable to import delegates') }} </p>
                                                <p>{{ __('Kindly fix the issues below then try again:') }}</p>
                                                <li>{{ $uploadErrors }}</li>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!--end::Card body-->
                </div>
            </div>
        </div>
    </div>


