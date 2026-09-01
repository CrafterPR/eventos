<x-default-layout>

    @section('title')
        Purchased Tickets
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('tickets.view-purchased') }}
    @endsection

        <style type="text/css">
            /* Rappasoft Livewire Tables filter dropdown */
            .dropdown-menu[role="menu"] {
                min-width: 250px !important;
            }

            /* Give individual filters enough room */
            .dropdown-menu[role="menu"] .p-2 {
                width: 100%;
            }
            .form-check {
                padding-bottom: 0.5rem;
            }
            .lw-table-footer {
                white-space: pre-line !important;
            }
            .dropdown-menu>a{
                inset: 0px 0px auto auto;
                margin: 0px;
                transform: translate3d(10px, 20.5px, 0px) !important;
                position: absolute;
            }
        </style>

    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">

            </div>
            <!--begin::Card title-->

            <!--begin::Card toolbar-->
            <div class="card-toolbar">


            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->

        <!--begin::Card body-->
        <div class="card-body py-4">
            <!--begin::Table-->
            <div class="table-responsive">
                <livewire:events.purchased-tickets />
            </div>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>

    @push('scripts')

            <script>
            document.addEventListener('DOMContentLoaded', function () {
                const forms = document.querySelectorAll('.resend-reminder-form');
                forms.forEach(function (form) {
                form.addEventListener('submit', function (e) {
                e.preventDefault();
                const ref = form.dataset.ref || '';

                if (typeof Swal === 'undefined') {
                // Fallback to native confirm
                if (confirm('Send payment reminder to purchaser for ' + ref + '?')) {
                form.submit();
            }
                return;
            }

                Swal.fire({
                title: 'Send payment reminder?',
                text: 'Send reminder to purchaser for ' + ref + '?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, send',
                cancelButtonText: 'Cancel'
            }).then(function (result) {
                if (result.isConfirmed) {
                form.submit();
            }
            });
            });
            });

                // Initialize flatpickr range for purchase date
                try {
                if (typeof flatpickr !== 'undefined') {
                flatpickr('#purchase_date_range', {
                mode: 'range',
                dateFormat: 'Y-m-d',
                allowInput: true,
                onClose: function(selectedDates, dateStr) {
                if (!dateStr) {
                document.getElementById('date_from').value = '';
                document.getElementById('date_to').value = '';
                return;
            }
                var parts = dateStr.split(' to ');
                if (parts.length === 2) {
                document.getElementById('date_from').value = parts[0];
                document.getElementById('date_to').value = parts[1];
            } else {
                document.getElementById('date_from').value = parts[0];
                document.getElementById('date_to').value = parts[0];
            }
            }
            });
            }
            } catch (err) {
                // ignore
            }

            });

            document.getElementById('mySearchInput').addEventListener('keyup', function () {
                window.LaravelDataTables['purchased-tickets'].search(this.value).draw();
            });
            document.addEventListener('livewire:init', function () {
                Livewire.on('success', function () {
                    $('#kt_modal_add_user').modal('hide');
                    window.LaravelDataTables['purchased-tickets'].ajax.reload();
                });
             });
            document.addEventListener('livewire:init', function () {
                Livewire.on('success', function () {
                    $('#kt_modal_update_purchase').modal('hide');
                    window.LaravelDataTables['purchased-tickets'].ajax.reload();
                });
            });
        </script>
    @endpush

</x-default-layout>
