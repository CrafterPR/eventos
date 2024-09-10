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
                <livewire:delegate.import-delegates-modal />
                <livewire:delegate.print-pass-modal />
                <!--end::Modal-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->

        <!--begin::Card body-->
        <div class="card-body py-4">
            <!--begin::Table-->
            <div class="table-responsive">
               <livewire:delegate.delegates-table />
            </div>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>

    @push('scripts')
        <script>

            // Add click event listener to delete buttons
            document.querySelectorAll('[data-kt-action="delete_row"]').forEach(function (element) {
                element.addEventListener('click', function () {
                    Swal.fire({
                        text: 'Are you sure you want to remove?',
                        icon: 'warning',
                        buttonsStyling: false,
                        showCancelButton: true,
                        confirmButtonText: 'Yes',
                        cancelButtonText: 'No',
                        customClass: {
                            confirmButton: 'btn btn-danger',
                            cancelButton: 'btn btn-secondary',
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Livewire.dispatch('delete_delegate', this.getAttribute('data-kt-delegate-id'));
                        }
                    });
                });
            });

            // Add click event listener to update buttons
            document.querySelectorAll('[data-kt-action="update_row"]').forEach(function (element) {
                element.addEventListener('click', function () {
                    Livewire.dispatch('update_delegate', this.getAttribute('data-kt-delegate-id'));
                });
            });
            document.querySelectorAll('[data-kt-action="print_pass"]').forEach(function (element) {
                element.addEventListener('click', function () {
                    Livewire.dispatch('get_delegate', {"delegate" : this.getAttribute('data-kt-delegate-id')});
                });
            });

            document.querySelectorAll('[data-kt-action="redeem_coupon"]').forEach(function (element) {
                element.addEventListener('click', function () {
                    Livewire.dispatch('redeem_coupon', this.getAttribute('data-kt-delegate-id'));
                });
            });

            // Listen for 'success' event emitted by Livewire
            Livewire.on('success', (message) => {
                // Reload the delegates-table datatable
                Livewire.dispatch('refreshDatatable');
            });

            document.addEventListener('livewire:init', function () {
                Livewire.on('success', function () {
                    $('#kt_modal_add_delegate').modal('hide');
                    $('#kt_modal_redeem_coupon').modal('hide');
                    $('#kt_modal_import_delegates').modal('hide');
                    $('#kt_modal_print_preview').modal('hide');
                    Livewire.dispatch('refreshDatatable');
                });
                Livewire.on('closeModal', function () {
                    $('#kt_modal_print_preview').modal('hide');
                    $('#kt_modal_import_delegates').modal('hide');
                    Livewire.dispatch('refreshDatatable');
                });
            });


            function reinitializeJavaScript() {
                // Any other reinitialization logic can go here
            }

            // Ensure reinitialization happens on Livewire updates
            document.addEventListener('livewire:load', reinitializeJavaScript);
            document.addEventListener('livewire:element.updated', reinitializeJavaScript);
        </script>
    @endpush

</x-default-layout>
