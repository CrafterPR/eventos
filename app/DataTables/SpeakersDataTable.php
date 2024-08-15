<?php

namespace App\DataTables;

use App\Enum\UserType;
use App\Models\Speaker;
use App\Models\User;
use Illuminate\Support\Str;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class SpeakersDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->rawColumns(['name', 'title', 'order', 'description', 'img_path', 'data_src' , 'modified_by'])
            ->editColumn('name', function (Speaker $speaker) {
                return view('pages.apps.programme.speaker.columns._name', compact('speaker'));
            })
            ->editColumn('title', function (Speaker $speaker) {
                return ucwords($speaker->title);
            })
            ->editColumn('order', function (Speaker $speaker) {
                return sprintf('<div class="badge badge-light fw-bold">%s</div>', $speaker->order);
            })
            ->editColumn('updated_at', function (Speaker $speaker) {
                return $speaker->updated_at?->format('d M Y, h:i a');
            })
            ->editColumn('modified_by', function (Speaker $speaker) {
                return $speaker->modifiedBy?->name;
            })
            ->addColumn('action', function (Speaker $speaker) {
                return view('pages.apps.programme.speaker.columns._actions', compact('speaker'));
            })
            ->setRowId('id');
    }


    /**
     * Get the query source of dataTable.
     */
    public function query(Speaker $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('speakers-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('rt' . "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'p>>", )
            ->addTableClass('table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer text-gray-600 fw-semibold')
            ->setTableHeadClass('text-start text-muted fw-bold fs-7 text-uppercase gs-0')
            ->orderBy(2, 'asc')
            ->drawCallback("function() {" . file_get_contents(resource_path('views/pages/apps/programme/speaker/columns/_draw-scripts.js')) . "}");
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('name')->addClass('d-flex align-items-center')->title('Full name'),
            Column::make('title')->addClass('align-items-center')->title('Title'),
            Column::make('order')->title('Order in list'),
            Column::make('updated_at')->title('Date modified')->addClass('text-nowrap'),
            Column::make('modified_by')->title('Modified by')->addClass('text-nowrap'),
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
        return 'Speakers_' . date('YmdHis');
    }
}
