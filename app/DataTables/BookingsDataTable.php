<?php

namespace App\DataTables;

use App\Enum\BookingStatus;
use App\Enum\Currency;
use App\Models\Booking;
use App\Models\Booth;
use Illuminate\Support\Str;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class BookingsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->rawColumns(['description','label', 'status', 'notes'])

            ->editColumn('description', function (Booking $booking) {
                return Str::upper($booking->booth->description);
            })
           ->editColumn('label', function (Booking $booking) {
               return Str::upper($booking->booth->label);
           })
           ->editColumn('status', function (Booking $booking) {
               return Str::upper($booking->status);
           })
           ->editColumn('notes', function (Booking $booking) {
               return Str::upper($booking->status);
           })
            ->editColumn('institution', function (Booking $booking) {
                return Str::upper($booking->user?->institution);
            })
            ->editColumn('contact', function (Booking $booking) {
                return Str::upper($booking->user?->first_name);
            })
            ->editColumn('email', function (Booking $booking) {
                return Str::Title($booking->user?->email. ','. $booking->user?->mobile);
            })
            ->editColumn('created_at', function (Booking $booking) {
                return format_date($booking->created_at);
            })

            ->setRowId('id');
    }


    /**
     * Get the query source of dataTable.
     */
    public function query(Booking $model): QueryBuilder
    {
        return $model->with(['user', 'booth'])
            ->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('bookings-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('rt' . "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'p>>", )
            ->addTableClass('table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer text-gray-600 fw-semibold')
            ->setTableHeadClass('text-start text-success fw-bold fs-7 text-uppercase gs-0')
            ->orderBy(5, 'DESC')
            ->drawCallback("function() {" . file_get_contents(resource_path('views/pages/apps/booths/booths-swal.js')) . "}");
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
           // 'uuid','label', 'kes_price', 'usd_price', 'row_name', 'status', 'description',
            Column::make('description')->title('Description')->addClass('align-items-center')->name('booth.description'),
            Column::make('label')->title('Label')->addClass('align-items-left')->name('booth.label'),
            Column::make('institution')->title('Institution')->addClass('align-items-left')->name('user.institution'),
            Column::make('contact')->title('Booked by')->addClass('align-items-left')->name('user.mobile'),
            Column::make('email')->title('Contacts')->addClass('align-items-left')->name('user.email'),
            Column::make('created_at')->title('Date')->addClass('align-items-left')->name('created_at'),
            Column::make('notes')->title('Comments')->addClass('align-items-left')->name('notes'),

        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Bookings' . date('YmdHis');
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
