<?php

namespace App\DataTables;

use App\Enum\OrderItemStatus;
use App\Enum\OrderStatus;
use App\Models\OrderItem;
use App\Models\Ticket;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class TicketsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->rawColumns(['title', 'covers', 'priority', 'days', 'persons', 'kes_amount', 'usd_amount', 'status'])

            ->editColumn('title', function (Ticket $ticket) {
                return Str::upper($ticket->title);
            })
            ->editColumn('covers', function (Ticket $ticket) {
                return $ticket->covers;
            })
            ->editColumn('priority', function (Ticket $ticket) {
                return $ticket->priority;
            })
            ->editColumn('days', function (Ticket $ticket) {
                return $ticket->days;
            })
            ->editColumn('persons', function (Ticket $ticket) {
                return $ticket->persons;
            })
            ->editColumn('kes_amount', function (Ticket $ticket) {
                return $ticket->kes_amount;
            })
            ->editColumn('usd_amount', function (Ticket $ticket) {
                return $ticket->usd_amount;
            })
           ->editColumn('status', function (Ticket $ticket) {
               return sprintf('<div class="badge badge-%s fw-bold">%s</div>', $this->getStatusColour($ticket->status), $ticket->status);
           })

            ->addColumn('action', function (Ticket $ticket) {
                return view('pages.apps.ticket-management.columns._manage_actions', compact('ticket'));
            })
            ->setRowId('id');
    }


    /**
     * Get the query source of dataTable.
     */
    public function query(Ticket $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('tickets')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('rt' . "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'p>>", )
            ->addTableClass('table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer text-gray-600 fw-semibold')
            ->setTableHeadClass('text-start text-success fw-bold fs-7 text-uppercase gs-0')
            ->orderBy(3)
            ->drawCallback("function() {" . file_get_contents(resource_path('views/pages//apps/ticket-management/ticket-swal.js')) . "}");
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('title')->title('Title')->addClass('align-items-center'),
            Column::make('covers')->title('Covers')->addClass('align-items-left'),
            Column::make('days')->title('Days')->addClass('align-items-center'),
            Column::make('persons')->title('Persons')->addClass('align-items-right'),
            Column::make('kes_amount')->title('KES Amt')->addClass('align-items-center'),
            Column::make('usd_amount')->title('USD Amt')->addClass('align-items-center'),
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
        return 'Tickets_' . date('YmdHis');
    }

    protected function getStatusColour($status): string
    {
        return match ($status) {
            'inactive' => 'warning',
            'active' => 'success',
            default => 'danger',
        };
    }
}
