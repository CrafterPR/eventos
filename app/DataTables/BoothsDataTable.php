<?php

namespace App\DataTables;

use App\Enum\BookingStatus;
use App\Enum\Currency;
use App\Models\Booth;
use Illuminate\Support\Str;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class BoothsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->rawColumns(['description','label', 'kes_price', 'usd_price', 'row_name', 'status', 'description',])

            ->editColumn('description', function (Booth $booth) {
                return Str::title($booth->description);
            })
            ->editColumn('label', function (Booth $booth) {
                return Str::upper($booth->label);
            })
            ->editColumn('kes_price', function (Booth $booth) {
                return format_amount($booth->kes_price, Currency::KES);
            })
            ->editColumn('usd_price', function (Booth $booth) {
                return format_amount($booth->usd_price, Currency::USD);
            })
            ->editColumn('row_name', function (Booth $booth) {
                return Str::upper($booth->row_name);
            })
           ->editColumn('status', function (Booth $booth) {
               return sprintf('<div class="badge badge-%s fw-bold">%s</div>', $this->getStatusColour($booth->bookings?->booking_status->value), Str::upper($booth->bookings?->booking_status->value ?? BookingStatus::AVAILABLE->value));
           })
            ->editColumn('payment_verified_by', function (Booth $booth) {
                $orderUser = $booth->order?->paymentVerifiedBy;
                return view('pages.apps.ticket-management.columns._user', ['user' => $orderUser]);
            })
           ->editColumn('payment_verified_at', function (Booth $booth) {
               return $booth->order?->payment_verified_at?->format('d/M/y h:i A');
           })
            ->addColumn('action', function (Booth $booth) {
                return view('pages.apps.booths.columns._actions', compact('booth'));
            })
            ->setRowId('id');
    }


    /**
     * Get the query source of dataTable.
     */
    public function query(Booth $model): QueryBuilder
    {
        return $model->with(['bookings'])
            ->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('booths-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('rt' . "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'p>>", )
            ->addTableClass('table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer text-gray-600 fw-semibold')
            ->setTableHeadClass('text-start text-success fw-bold fs-7 text-uppercase gs-0')
            ->orderBy(3)
            ->drawCallback("function() {" . file_get_contents(resource_path('views/pages/apps/booths/booths-swal.js')) . "}");
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
           // 'uuid','label', 'kes_price', 'usd_price', 'row_name', 'status', 'description',
            Column::make('description')->title('Description')->addClass('align-items-center'),
            Column::make('label')->title('Label')->addClass('align-items-left')->name('label'),
            Column::make('kes_price')->title('Price (KES)')->addClass('align-items-left')->name('kes_price'),
            Column::make('usd_price')->title('Price (USD)')->addClass('align-items-left')->name('usd_price'),
            Column::make('status')->title('Status')->addClass('align-items-center'),
            Column::computed('action')
                ->addClass('text-end text-nowrap')
                ->exportable()
                ->printable()
                ->width(60)
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Booth' . date('YmdHis');
    }

    protected function getStatusColour($status): string
    {
        return match ($status) {
            BookingStatus::RESERVED->value, BookingStatus::PENDING->value  => 'secondary',
            BookingStatus::BOOKED->value => 'success',
            BookingStatus::EXPIRED->value => 'danger',
            BookingStatus::AVAILABLE->value => 'default',
            default => 'warning',
        };
    }
}
