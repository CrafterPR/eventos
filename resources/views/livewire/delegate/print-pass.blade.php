
<div class="modal fade" id="kt_modal_print_preview" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_redeem_coupon">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Pass print preview</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" aria-label="Close">
                    {!! getIcon('cross','fs-2qx') !!}
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body">
                <div class="card text-center" id="printableArea" style="width: 500px; margin: 0 auto; padding: 20px;">
                    @if($delegate)
                        <h1 class="mb-3">{{ $delegate->name }}</h1>
                        <h3 class="mb-2">{{ $delegate->organization }}</h3>
                        <div class="m-8">
                            {!! QrCode::size(100)->color(75, 0, 130)->generate($delegate->id) !!}
                        </div>
                    @if($delegate->event->show_category)
                        <h4 class="mb-4 text-active-gray-100">{{ $delegate->category->title }}</h4>
                    @endif
                        <input type="hidden" id="delegate-id" value="{{ $delegate->id }}">
                    @endif
                    @if($delegate?->has_ticket_type)
                      <h3 class="mb-4 text-active-gray-100">{{ $delegate->ticket_type }}</h3>
                    @endif
                    <h5 class="text-muted">{{$delegate->event->footer_text ?? 'Powered by www.craftedpr.co.ke' }}</h5>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
                    <button type="button" class="btn btn-success" id="printMe">Print</button>
                </div>
                <!--end::Card body-->
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(function() {
            $('#printMe').on('click', function() {
                $("#printableArea").printThis({
                    debug: false,
                    importCSS: true,
                    importStyle: true,
                    printContainer: true,
                    pageTitle: "Delegate Pass Preview",
                    removeInline: true,
                    printDelay: 500,
                    header: null,
                    formValues: false
                });

                setTimeout(() => {
                    let delegate = $('#delegate-id').val();
                    Livewire.dispatch('print_pass', {'delegate': delegate});
                    Livewire.dispatch('refreshDatatable');
                    $('#kt_modal_print_preview').modal('hide');
                    Livewire.dispatch('success', 'Print pass successfully printed and record updated.')
                    window.location.reload();
                },2000)
            });

        })


    </script>
@endpush



