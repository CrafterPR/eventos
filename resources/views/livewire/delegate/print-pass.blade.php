
<div class="modal fade" id="kt_modal_print_preview" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_redeem_coupon">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Delegate pass preview</h2>
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
                <div class="card text-center" id="printableArea" style="width: 500px; margin: 0 auto; padding: 20px;">
                    @if($delegate)
                        <h1 class="mb-3">{{ $delegate->name }}</h1>
                        <h3 class="mb-2">{{ $delegate->organization }}</h3>
                        <div class="m-8">
                            {!! QrCode::size(100)->color(75, 0, 130)->generate($delegate->id) !!}
                        </div>
                        <h4 class="mb-4 text-active-gray-100">{{ $delegate->position }}</h4>
                        <input type="hidden" id="delegate-id" value="{{ $delegate->id }}">
                    @endif
                    <h5 class="text-muted">Powered by www.craftedpr.co.ke</h5>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal">Close</button>
                    <button type="button" class="btn btn-success" onclick="printDiv('printableArea')">Print</button>
                </div>
                <!--end::Card body-->
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function printDiv(divId) {
            var printContents = document.getElementById(divId).innerHTML;

            let delegate = $('#delegate-id').val();
            Livewire.dispatch('print_pass', {'delegate': delegate});


            Livewire.dispatch('refreshDatatable');
            $('#kt_modal_print_preview').modal('hide');

            let originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();

            document.body.innerHTML = originalContents;
            Livewire.dispatch('success', 'Print pass successfully printed and record updated.')
            setTimeout(() => {
                window.location.reload();
            },1000)
        }
    </script>
@endpush



