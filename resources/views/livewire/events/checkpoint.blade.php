
<div class="modal fade" id="kt_modal_add_checkpoint" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Add a checkpoint</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <!--begin::Form-->
                <form  wire:submit.prevent="submit" id="kt_modal_add_checkpoint_form" class="form" action="#" >
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="required fs-6 fw-semibold form-label mb-2">Checkpoint Name</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input wire:model="checkpoint.name" type="text" class="form-control form-control-solid" />
                        @error('checkpoint.name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->

                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <label class="required fs-6 fw-semibold form-label mb-2">Is gift checkpoint?</label>
                        <input wire:model="checkpoint.is_gift_checkpoint" type="checkbox" id="is_gift_checkpoint" class="form-select-lg" />
                    </div>
                    <div class="fv-row mb-7 d-none" id="div-select_leader_id">
                        <!--begin::Label-->
                        <label class="required fs-6 fw-semibold form-label mb-2">Choose the staff account to scan gifts</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select wire:model="checkpoint.leader_id" id="select_leader_id"
                                class="form-select custom-select2 @error('checkpoint.user_id') border-danger @enderror"
                                data-control="select2"
                                data-placeholder="">
                            <option value="">Select</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">
                                    {{$user->name}}
                                </option>
                            @endforeach
                        </select>

                        @error('checkpoint.leader_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <!--end::Input-->
                    </div>

                    <!--end::Input group-->
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

@push('scripts')
    <script>
  $('#is_gift_checkpoint').on('change', function() {
          if($(this).is(':checked')) {
              $('#div-select_leader_id').removeClass('d-none');
          } else {
              $('#div-select_leader_id').addClass('d-none');
          }
  });
    </script>
@endpush
