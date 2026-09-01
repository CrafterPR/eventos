<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Support\Str;
use App\Models\PurchaseOrder;
use Yajra\DataTables\Html\Column;
use App\Enum\PurchaseOrderStatus;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class PurchaseOrdersDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('reference', function (PurchaseOrder $order) {
                return view('pages.apps.event-management.columns._reference', compact('order'));
            })
            ->editColumn('user_id', function (PurchaseOrder $order) {
                $row = $order->user;
                return view('pages.apps.delegates.columns._user', compact('row'));
            })
            ->rawColumns(['currency', 'payment_receipt'])

            ->editColumn('organization', function (PurchaseOrder $order) {
                return Str::upper($order->organization);
            })
            ->editColumn('amount', function (PurchaseOrder $order) {
                return  $order->currency .' '. number_format($order->amount, 2, '.', ',');
            })
            ->editColumn('tickets', function (PurchaseOrder $order) {
                return view('pages.apps.event-management.columns._tickets', compact('order'));
            })

            ->editColumn('status', function (PurchaseOrder $order) {
                return view('pages.apps.event-management.columns._status', compact('order'));
            })
            ->addColumn('action', function (PurchaseOrder $order) {
                return view('pages.apps.event-management.columns._manage_actions', compact('order'));
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PurchaseOrder $model): QueryBuilder
    {
        return $model->with('user', 'pesaflow_request')->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('purchase_orders')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('rt' . "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'p>>", )
            ->addTableClass('table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer text-gray-600 fw-semibold')
            ->setTableHeadClass('text-start text-success fw-bold fs-7 text-uppercase gs-0')
            ->orderBy(1)
            ->drawCallback("function() {" . file_get_contents(resource_path('views/pages/apps/event-management/tickets-swal.js')) . "}");
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('reference')->title('Reference')->addClass('align-items-center'),
            Column::make('user_id')->title('Delegate')->addClass('align-items-left'),
            Column::make('organization')->title('Organization')->addClass('align-items-left'),
            Column::make('amount')->title('Amount')->addClass('align-items-right')->name('amount'),
            Column::make('tickets')->title('Tickets')->addClass('align-items-left'),
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
        return 'Purchase_orders' . date('YmdHis');
    }

    protected function getStatusColour($status): string
    {
        return match ($status) {
            PurchaseOrderStatus::NEW->value => 'warning',
            PurchaseOrderStatus::PAID->value => 'success',
            PurchaseOrderStatus::FAILED->value => 'danger',
            default => 'info',
        };
    }
}
