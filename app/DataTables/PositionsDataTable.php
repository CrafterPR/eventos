<?php

namespace App\DataTables;

use App\Enum\VotingPositionStatus;
use App\Models\VotingPosition;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class PositionsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->rawColumns(['title',  'period', 'status', 'created_by'])

            ->editColumn('created_at', function (VotingPosition $position) {
                return $position->created_at->format('dS m, y');
            })
            ->editColumn('period', function (VotingPosition $position) {
                return $position->period->name;
            })
            ->editColumn('created_by', function (VotingPosition $position) {
                $creator = $position->creator;
                return view('pages.apps.voting-positions.columns._user', compact('creator'));
            })


           ->editColumn('status', function (VotingPosition $position) {
               return sprintf('<div class="badge badge-%s fw-bold">%s</div>', $this->getStatusColour($position->status), $position->status);
           })

            ->addColumn('action', function (VotingPosition $position) {
                return view('pages.apps.voting-positions.columns._actions', compact('position',));
            })
            ->setRowId('uuid');
    }


    /**
     * Get the query source of dataTable.
     */
    public function query(VotingPosition $model): QueryBuilder
    {
        return $model->with(['creator', 'period'])->orderBy('voting_positions.created_at', 'desc');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('voting-positions')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('rt' . "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'p>>", )
            ->addTableClass('table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer text-gray-600 fw-semibold')
            ->setTableHeadClass('text-start text-success fw-bold fs-7 text-uppercase gs-0')
            ->drawCallback("function() {" . file_get_contents(resource_path('views/pages/apps/voting-positions/positions-swal.js')) . "}");
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('title')->title('Position Name')->addClass('align-items-center')->name('title'),
            Column::make('period')->title('Period')->addClass('align-items-left')->orderable(false)->name('period.name'),
            Column::make('code')->title('Code')->addClass('align-items-left')->name('code'),
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
        return 'VotingPositions' . date('YmdHis');
    }

    protected function getStatusColour($status): string
    {
        return match ($status) {
            VotingPositionStatus::ENABLED->value => 'success',
            VotingPositionStatus::DISABLED->value => 'warning',
        };
    }
}
