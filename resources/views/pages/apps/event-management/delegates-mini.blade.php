<div class="card-body py-4">
    <!--begin::Table-->
    <div class="table-responsive">
        {{ $dataTable->table() }}
    </div>
    <!--end::Table-->
</div>


@push('scripts')
{{ $dataTable->scripts() }}
@endpush
