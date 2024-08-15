<div  class="modal fade" id="kt_modal_add_speaker" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_user_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">{{ $title }}</h2>
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
                <form id="kt_modal_add_user_form" class="form" action="#" wire:submit="submit" enctype="multipart/form-data">
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="d-block fw-semibold fs-6 mb-5">Avatar</label>
                            <!--end::Label-->
                            <!--begin::Image placeholder-->
                            <style>
                                .image-input-placeholder {
	                                background-image: url('{{ image('svg/files/blank-image.svg') }}');
                                }

                                [data-bs-theme="dark"] .image-input-placeholder {
	                                background-image: url('{{ image('svg/files/blank-image-dark.svg') }}');
                                }
                            </style>
                            <!--end::Image placeholder-->
                            <!--begin::Image input-->
                            <div class="image-input image-input-outline image-input-placeholder {{ $avatar || $saved_avatar ? '' : 'image-input-empty' }}" data-kt-image-input="true">
                                <!--begin::Preview existing avatar-->
                                @if($avatar)
                                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ $avatar ? $avatar->temporaryUrl() : '' }});"></div>
                                @else
                                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ image('images/'.$saved_avatar) }});"></div>
                                @endif
                                <!--end::Preview existing avatar-->
                                <!--begin::Label-->
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                    {!! getIcon('pencil','fs-7') !!}
                                    <!--begin::Inputs-->
                                    <input type="file" wire:model="avatar" name="avatar" accept=".png, .jpg, .jpeg, .svg"/>
                                    <input type="hidden" name="avatar_remove"/>
                                    <!--end::Inputs-->
                                </label>
                                <!--end::Label-->
                                <!--begin::Cancel-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                    {!! getIcon('cross','fs-2') !!}
                                </span>
                                <!--end::Cancel-->
                                <!--begin::Remove-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                    {!! getIcon('cross','fs-2') !!}
                                </span>
                                <!--end::Remove-->
                            </div>
                            <!--end::Image input-->
                            <!--begin::Hint-->
                            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                            <!--end::Hint-->
                            @error('avatar')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Speaker Name</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" wire:model="speaker.name" name="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Full name"/>
                            <!--end::Input-->
                            @error('speaker.name')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Title</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" wire:model="speaker.title" class="form-control form-control-solid mb-3 mb-lg-0" />
                            <!--end::Input-->
                            @error('speaker.title')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fw-semibold fs-6 mb-2">Description</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <textarea  wire:model="speaker.description" id="speaker-description" class="form-control form-control-solid mb-3 mb-lg-0">

                            </textarea>
                            <!--end::Input-->
                            @error('speaker.description')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="row fv-row mb-7">
                            <div class="col-md-6">
                                   <!--begin::Label-->
                                <label class="required fw-semibold fs-6 mb-2">Data Source</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                <input  wire:model="speaker.data_src" class="form-control form-control-solid mb-3 mb-lg-0" />
                                    <!--end::Input-->
                                    @error('speaker.data_src')
                                    <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                         <div class="col-md-6">
                               <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Order in list</label>
                             <!--end::Label-->
                             <!--begin::Input-->
                            <input type="number"  wire:model="speaker.order" class="form-control form-control-solid mb-3 mb-lg-0" />
                             <!--end::Input-->
                             @error('speaker.order')
                             <span class="text-danger">{{ $message }}</span> @enderror
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

