<x-default-layout>

    @section('title')
        Delegates
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('delegates.index') }}
    @endsection

    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    {!! getIcon('magnifier', 'fs-3 position-absolute ms-5') !!}
                    <input type="text" data-kt-user-table-filter="search"
                           class="form-control form-control-solid w-250px ps-13" placeholder="Search delegates"
                           id="mySearchInput"/>
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->

            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    @can('import-delegates')
                        <a class="btn btn-warning" href="#" data-bs-toggle="modal" data-bs-target="#kt_modal_import_delegates"
                        >{!! getIcon('file', 'fa-2x') !!}Import delegates</a>
                    @endcan
                    &nbsp;
                    @can('create-delegate')
                            <a class="btn btn-primary" href="{{route("users.delegates.create")}}">{!! getIcon('plus', 'fa-2x') !!}Add a delegate</a>
                    @endcan
                            <!--end::Add user-->
                </div>
                <!--end::Toolbar-->

                <!--begin::Modal-->
                <livewire:delegate.import-delegates-modal></livewire:delegate.import-delegates-modal>
                <livewire:delegate.print-pass-modal></livewire:delegate.print-pass-modal>
                <!--end::Modal-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->

        <!--begin::Card body-->
        <div class="card-body py-4">
            <!--begin::Table-->
            <div class="table-responsive">
                {{ $dataTable->table() }}
            </div>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>

    @push('scripts')
        {{ $dataTable->scripts() }}
        <script>
            document.getElementById('mySearchInput').addEventListener('keyup', function () {
                window.LaravelDataTables['delegates-table'].search(this.value).draw();
            });
            document.addEventListener('livewire:init', function () {
                Livewire.on('success', function () {
                    $('#kt_modal_add_delegate').modal('hide');
                    $('#kt_modal_redeem_coupon').modal('hide');
                    $('#kt_modal_import_delegates').modal('hide');
                    $('#kt_modal_print_preview').modal('hide');
                    window.LaravelDataTables['delegates-table'].ajax.reload();
                });
                Livewire.on('closeModal', function () {
                    $('#kt_modal_print_preview').modal('hide');
                    window.LaravelDataTables['delegates-table'].ajax.reload();
                });
            });

            function printDiv(divId) {
                var printContents = document.getElementById(divId).innerHTML;

                let delegate = $('#delegate-id').val();
                Livewire.dispatch('print_pass', {'delegate': delegate});


                window.LaravelDataTables['delegates-table'].ajax.reload();
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


            function reinitializeJavaScript() {
                // Any other reinitialization logic can go here
            }

            // Ensure reinitialization happens on Livewire updates
            document.addEventListener('livewire:load', reinitializeJavaScript);
            document.addEventListener('livewire:element.updated', reinitializeJavaScript);
        </script>
    @endpush

</x-default-layout>
