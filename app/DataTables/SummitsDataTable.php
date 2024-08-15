<?php

namespace App\DataTables;

use App\Enum\BookingStatus;
use App\Enum\Currency;
use App\Models\Booking;
use App\Models\Booth;
use App\Models\EventSummit;
use App\Models\Speaker;
use Illuminate\Support\Str;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class SummitsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->rawColumns(['leader','lead_organization', 'title', 'profile_photo_url', 'leader_contact', 'targets'])

            ->editColumn('description', function (EventSummit $summit) {
                return trim_text(strip_tags($summit->description, 5));
            })
            ->editColumn('targets', function (EventSummit $summit) {
                return $summit->targets;
            })
            ->editColumn('leader_bio', function (EventSummit $summit) {
                return trim_text(strip_tags($summit->leader_bio, 5));
            })
            ->editColumn('leader', function (EventSummit $summit) {
                return view('pages.apps.summits.columns._lead', compact('summit'));
            })
            ->addColumn('action', function (EventSummit $summit) {
                return view('pages.apps.summits.columns._actions', compact('summit'));
            })
            ->setRowId('id');
    }


    /**
     * Get the query source of dataTable.
     */
    public function query(EventSummit $model): QueryBuilder
    {
        return $model->whereNotNull('title')
        ->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('event-summits')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('rt' . "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'p>>", )
            ->addTableClass('table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer text-gray-600 fw-semibold')
            ->setTableHeadClass('text-start text-success fw-bold fs-7 text-uppercase gs-0')
            ->orderBy(5, 'DESC')
            ->drawCallback("function() {" . file_get_contents(resource_path('views/pages/apps/summits/events-swal.js')) . "}");
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('leader')->title('Summit leader')->addClass('align-items-left')->name('leader'),
            Column::make('title')->title('Summit Name')->addClass('align-items-center')->name('title'),
            Column::make('targets')->title('Target Audience')->addClass('align-items-center')->name('targets'),
            Column::make('lead_organization')->title('Lead organization')->addClass('align-items-left')->name('lead_organization'),
            Column::make('leader_bio')->title('Lead Bio')->addClass('align-items-left')->name('leader_bio'),
            Column::make('order')->title('Order')->addClass('align-items-left')->name('order'),
            Column::computed('action')
                ->addClass('text-end text-nowrap')
                ->exportable(false)
                ->printable(false)
                ->width(60)
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Events' . date('YmdHis');
    }

}
