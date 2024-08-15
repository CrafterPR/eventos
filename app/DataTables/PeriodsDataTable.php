<?php

namespace App\DataTables;

use App\Enum\OrderItemStatus;
use App\Enum\OrderStatus;
use App\Enum\VotingPeriodStatus;
use App\Models\OrderItem;
use App\Models\Ticket;
use App\Models\VotingPeriod;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class PeriodsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->rawColumns(['created_at','name',  'starts_at', 'ends_at', 'status', 'created_by'])
            ->editColumn('election_date', function (VotingPeriod $period) {
                return Carbon::parse($period->election_date)->format('dS m, y');
            })
            ->editColumn('starts_at', function (VotingPeriod $period) {
                return Carbon::parse($period->starts_at)->format('H:i A');
            })
            ->editColumn('ends_at', function (VotingPeriod $period) {
                return Carbon::parse($period->ends_at)->format('H:i A');
            })
            ->editColumn('created_at', function (VotingPeriod $period) {
                return $period->created_at->format('dS m, y');
            })
            ->editColumn('created_by', function (VotingPeriod $period) {
                $creator = $period->creator;
                return view('pages.apps.voting-periods.columns._user', compact('creator'));
            })


           ->editColumn('status', function (VotingPeriod $period) {
               return sprintf('<div class="badge badge-%s fw-bold">%s</div>', $this->getStatusColour($period->status), $period->status);
           })

            ->addColumn('action', function (VotingPeriod $period) {
                return view('pages.apps.voting-periods.columns._actions', compact('period',));
            })
            ->setRowId('uuid');
    }


    /**
     * Get the query source of dataTable.
     */
    public function query(VotingPeriod $model): QueryBuilder
    {
        return $model->with(['creator'])->orderBy('starts_at');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('voting-periods')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('rt' . "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'p>>", )
            ->addTableClass('table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer text-gray-600 fw-semibold')
            ->setTableHeadClass('text-start text-success fw-bold fs-7 text-uppercase gs-0')
            ->orderBy(3)
            ->drawCallback("function() {" . file_get_contents(resource_path('views/pages/apps/voting-periods/periods-swal.js')) . "}");
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
           // Column::make('reference')->title('Order #')->addClass('align-items-center'),
            Column::make('name')->title('Period Name')->addClass('align-items-center')->name('name'),
            Column::make('election_date')->title('Election date')->addClass('align-items-left')->name('election_date'),
            Column::make('starts_at')->title('Starts at')->addClass('align-items-left')->name('starts_at'),
            Column::make('ends_at')->title('Ends at')->addClass('align-items-left')->name('ends_at'),
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
        return 'VotingPeriods' . date('YmdHis');
    }

    protected function getStatusColour($status): string
    {
        return match ($status) {
            VotingPeriodStatus::OPEN->value => 'success',
            VotingPeriodStatus::CLOSED->value => 'warning',
            VotingPeriodStatus::SUSPENDED->value => 'danger',
        };
    }
}
