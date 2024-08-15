<div class="modal fade" id="kt_modal_import_voter" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-450px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_user_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Import Voters</h2>
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
                <form id="kt_modal_add_period_form" class="form" action="#"wire:submit="uploadVoters" enctype="multipart/form-data" >
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll"
                         data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                         data-kt-scroll-dependencies="#kt_modal_add_user_header"
                         data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="100%">
                        <!--begin::Input group-->
                        @csrf
                <div class="mb-6">
                    <div class="form-group">
                        <p class="text-sm mb-2">{{ __('1. Download the excel template by clicking the button below:') }} <i class="text-danger">*</i></p>
                        <a href="{{ asset('storage/voter_template.xlsx') }}" class="p-2 mb-4">
                            <span class="btn btn-sm btn-success">
                                {!! getIcon('file-down', 'fs-2', '', 'i') !!}
                                {{ __('Voter excel template') }}
                            </span>
                        </a>
                    </div>
                </div>
            </div>
                    <div class="mb-6">
                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <input type="file" id="file-upload-{{ $fileIteration }}"
                                       accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                                       class="form-control @error('importFile') is-invalid @enderror" @disabled($isImporting && !$importFinished)
                                       wire:model.live="importFile" wire:loading.attr="disabled">
                                @error('importFile') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                        <!--end::Scroll-->
                        <!--begin::Actions-->
                        <div class="text-center pt-15">
                            <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close"
                                    wire:loading.attr="disabled">Discard
                            </button>

                            <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit" @disabled($isImporting &&!$importFinished)>
                                 {!! getIcon('file-up', 'fs-2', '', 'i') !!}
                                <span class="indicator-label" wire:loading.remove>Process upload</span>
                                <span class="indicator-progress" wire:loading wire:target="submit">
                                processing...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </div>
                </form>
                @if($isImporting && !$importFinished)
                    <div wire:poll="updateImportProgress">
                        ...importing voter data <span class="spinner-border spinner-border-sm" role="status"
                                                               aria-hidden="true">
                    </div>
                @endif

                @if($importFinished && !$importCancelled)


                @endif

                @if ($importCancelled)
                    <p class="text-danger">Unable to import voters
                    </p>
                    <p>Kindly fix the issues below:</p>
                    <li>{{ $b2cUploadErrors }}</li>
                @endif
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>




