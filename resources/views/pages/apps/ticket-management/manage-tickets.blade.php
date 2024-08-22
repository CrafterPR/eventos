<x-default-layout>

    @section('title')
        Manage Tickets
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('tickets.manage-tickets.index') }}
    @endsection

    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    {!! getIcon('magnifier', 'fs-3 position-absolute ms-5') !!}
                    <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Search ticket" id="mySearchInput"/>
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->

            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <!--begin::Add user-->
                    @can('generate-tickets')
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_ticket">
                            {!! getIcon('plus', 'fs-2', '', 'i') !!}
                            Create Ticket
                        </button>
                    @endcan
                    <!--end::Add user-->
                </div>
                <!--end::Toolbar-->

                <!--begin::Modal-->
                <livewire:tickets.create-ticket />
                <livewire:tickets.edit-ticket />
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
                window.LaravelDataTables['tickets'].search(this.value).draw();
            });
            document.addEventListener('livewire:init', function () {
                Livewire.on('success', function () {
                    $('#kt_modal_edit_ticket,#kt_modal_create_ticket').modal('hide');
                        window.LaravelDataTables['tickets'].ajax.reload();
                });
            });

        </script>
    @endpush

</x-default-layout>
