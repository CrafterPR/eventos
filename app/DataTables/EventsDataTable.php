<?php

namespace App\DataTables;

use App\Enum\EventStatus;
use App\Models\Event;
use Illuminate\Support\Str;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class EventsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->rawColumns(['title', 'slug', 'theme', 'start_date', 'end_date', 'status'])
            ->editColumn('title', function (Event $event) {
                return Str::title($event->title);
            })
            ->editColumn('organization', function (Event $event) {
                return Str::upper($event->organization);
            })
            ->editColumn('delegates', function (Event $event) {
                return $event->delegates->count();
            })
            ->editColumn('start_date', function (Event $event) {
                return format_date($event->start_date);
            })
            ->editColumn('end_date', function (Event $event) {
                return format_date($event->end_date);
            })
            ->editColumn('status', function (Event $event) {
                return sprintf('<div class="badge badge-%s fw-bold">%s</div>', $this->getStatusColour($event->status->value), $event->status->value);
            })
            ->addColumn('action', function (Event $event) {
                return view('pages.apps.event-management.columns._manage_actions', compact('event'));
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Event $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('events')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('rt' . "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'p>>", )
            ->addTableClass('table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer text-gray-600 fw-semibold')
            ->setTableHeadClass('text-start text-success fw-bold fs-7 text-uppercase gs-0')
            ->orderBy(3)
            ->drawCallback("function() {" . file_get_contents(resource_path('views/pages/apps/event-management/event-swal.js')) . "}");
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('title')->title('Title')->addClass('align-items-center'),
            Column::make('organization')->title('Organization')->addClass('align-items-left'),
            Column::make('delegates')->title('Delegate count')->addClass('align-items-center')->name('delegates'),
            Column::make('start_date')->title('Start date')->addClass('align-items-right'),
            Column::make('end_date')->title('End date')->addClass('align-items-center'),
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
        return 'Events_' . date('YmdHis');
    }

    protected function getStatusColour($status): string
    {
        return match ($status) {
            EventStatus::INACTIVE->value => 'danger',
            EventStatus::ACTIVE->value => 'success',
            EventStatus::DRAFT->value => 'warning',
            default => 'info',
        };
    }
}
