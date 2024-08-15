<?php

namespace App\DataTables;

use App\Enum\ContestantStatus;
use App\Models\Contestant;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class ContestantsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->rawColumns(['uuid', 'full_name', 'unique_code', 'voting_period_uuid', 'voting_position_uuid', 'status', 'created_by'])

            ->editColumn('created_at', function (Contestant $contestant) {
                return $contestant->created_at->format('dS m, y');
            })
            ->editColumn('voting_period', function (Contestant $contestant) {
                return $contestant->voting_period?->name;
            })

            ->editColumn('voting_position', function (Contestant $contestant) {
                return $contestant->voting_position->title;
            })
            ->editColumn('created_by', function (Contestant $contestant) {
                $creator = $contestant->creator;
                return view('pages.apps.voting-contestants.columns._user', compact('creator'));
            })

           ->editColumn('status', function (Contestant $contestant) {
               return sprintf('<div class="badge badge-%s fw-bold">%s</div>', $this->getStatusColour($contestant->status), $contestant->status);
           })

            ->addColumn('action', function (Contestant $contestant) {
                return view('pages.apps.voting-contestants.columns._actions', compact('contestant',));
            })
            ->setRowId('contestants.uuid');
    }


    /**
     * Get the query source of dataTable.
     */
    public function query(Contestant $model): QueryBuilder
    {
        return $model->with(['voting_position', 'voting_period', 'creator']);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('contestants')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('rt' . "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'p>>", )
            ->addTableClass('table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer text-gray-600 fw-semibold')
            ->setTableHeadClass('text-start text-success fw-bold fs-7 text-uppercase gs-0')
            ->orderBy(4)
            ->drawCallback("function() {" . file_get_contents(resource_path('views/pages/apps/voting-contestants/contestants-swal.js')) . "}");
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('full_name')->title('Full name')->addClass('align-items-center')->name('full_name'),
            Column::make('unique_code')->title('Unique Code')->addClass('align-items-center')->name('unique_code'),
            Column::make('voting_period')->title('Period')->addClass('align-items-left')->orderable(false)->name('voting_period.name'),
            Column::make('voting_position')->title('Position')->addClass('align-items-left')->name('voting_position.title'),
            Column::make('created_at')->title('Date created')->addClass('align-items-center')->name('created_at'),
            Column::make('status')->title('Status')->addClass('align-items-center'),
            Column::make('created_by')->title('Created by')->addClass('align-items-center')->name('creator.first_name'),
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
        return 'Contestants' . date('YmdHis');
    }

    protected function getStatusColour($status): string
    {
        return match ($status) {
            ContestantStatus::DISABLED->value => 'warning',
            default => 'success',
        };
    }
}
