<?php

namespace App\DataTables;

use App\Enum\ContestantStatus;
use App\Enum\VoterStatus;
use App\Enum\VotingPeriodStatus;
use App\Models\Contestant;
use App\Models\Voter;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class VotersDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->rawColumns(['uuid', 'first_name', 'last_name', 'email', 'phone', 'status', 'created_by'])

            ->editColumn('created_at', function (Voter $voter) {
                return $voter->created_at->format('dS m, y');
            })
            ->editColumn('created_by', function (Voter $voter) {
                $creator = $voter->creator;
                return view('pages.apps.voters.columns._user', compact('creator'));
            })

           ->editColumn('status', function (Voter $voter) {
               return sprintf('<div class="badge badge-%s fw-bold">%s</div>', $this->getStatusColour($voter->status), $voter->statusValue);
           })

            ->addColumn('action', function (Voter $voter) {
                return view('pages.apps.voters.columns._actions', compact('voter',));
            })
            ->setRowId('contestants.uuid');
    }


    /**
     * Get the query source of dataTable.
     */
    public function query(Voter $model): QueryBuilder
    {
        return $model->with(['creator']);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('voters')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('rt' . "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'p>>", )
            ->addTableClass('table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer text-gray-600 fw-semibold')
            ->setTableHeadClass('text-start text-success fw-bold fs-7 text-uppercase gs-0')
            ->orderBy(4)
            ->drawCallback("function() {" . file_get_contents(resource_path('views/pages/apps/voters/voter-swal.js')) . "}");
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('first_name')->title('First name')->addClass('align-items-center')->name('first_name'),
            Column::make('last_name')->title('Last name')->addClass('align-items-center')->name('last_name'),
            Column::make('mobile')->title('Phone')->addClass('align-items-center')->name('mobile'),
            Column::make('email')->title('Email')->addClass('align-items-left')->name('email'),
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
        return 'Voters' . date('YmdHis');
    }

    protected function getStatusColour($status): string
    {
        return match ($status) {
            VoterStatus::INACTIVE->value => 'warning',
            VoterStatus::ACTIVE->value => 'success',
        };
    }
}
