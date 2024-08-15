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

class OrdersDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->rawColumns(['created_at','reference_no',  'currency', 'total_amount', 'receipt_url', 'status', 'payment_verified_by', 'payment_verified_at'])

            ->editColumn('reference', function (OrderItem $orderItem) {
                return Str::upper($orderItem->order?->reference);
            })
            ->editColumn('reference_no', function (OrderItem $orderItem) {
                return Str::upper($orderItem->reference_no);
            })
            ->editColumn('created_at', function (OrderItem $orderItem) {
                return $orderItem->created_at->format('d/M/y h:i A');
            })
            ->editColumn('ticket', function (OrderItem $orderItem) {
                return Str::upper($orderItem->itemable?->title);
            })
            ->editColumn('delegate', function (OrderItem $orderItem) {
                $user = $orderItem?->user;
                return view('pages.apps.ticket-management.columns._user', compact('user'));
            })
            ->editColumn('institution', function (OrderItem $orderItem) {
                return Str::upper($orderItem->user?->institution);
            })
            ->editColumn('total', function (OrderItem $orderItem) {
                return format_amount($orderItem->total, $orderItem->currency);
            })
           ->editColumn('status', function (OrderItem $orderItem) {
               return sprintf('<div class="badge badge-%s fw-bold">%s</div>', $this->getStatusColour($orderItem->status), $orderItem->status);
           })
            ->editColumn('payment_verified_by', function (OrderItem $orderItem) {
                $orderUser = $orderItem->order?->paymentVerifiedBy;
                return view('pages.apps.ticket-management.columns._user', ['user' => $orderUser]);
            })
           ->editColumn('payment_verified_at', function (OrderItem $orderItem) {
               return $orderItem->order?->payment_verified_at?->format('d/M/y h:i A');
           })
            ->addColumn('action', function (OrderItem $orderItem) {
                return view('pages.apps.ticket-management.columns._actions', compact('orderItem',));
            })
            ->setRowId('id');
    }


    /**
     * Get the query source of dataTable.
     */
    public function query(OrderItem $model): QueryBuilder
    {
        return $model->with(['user', 'order.paymentVerifiedBy'])
            ->whereHasMorph('itemable', Ticket::class)
            ->whereHas('order', function ($query) {
                $query->where('status', OrderStatus::SETTLED->value)
                      ->orWhere('status', OrderStatus::PENDING->value);
            });
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('purchased-tickets')
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
           // Column::make('reference')->title('Order #')->addClass('align-items-center'),
            Column::make('reference_no')->title('Ticket #')->addClass('align-items-center'),
            Column::make('delegate')->title('Delegate')->addClass('align-items-left')->name('user_id'),
            Column::make('institution')->title('Institution')->addClass('align-items-left')->name('user.institution'),
            Column::make('created_at')->title('Order date')->addClass('align-items-center'),
            Column::make('total')->title('Ticket Amt')->addClass('align-items-right'),
            Column::make('ticket')->title('Ticket type')->addClass('align-items-left')->searchable(false),
            Column::make('status')->title('Order Status')->addClass('align-items-center'),
            Column::make('payment_verified_by')->title('Verified by')->addClass('align-items-center')->name('user.first_name'),
            Column::make('payment_verified_at')->title('Verified on')->addClass('text-nowrap')->searchable(false),
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
        return 'ItemOrders_' . date('YmdHis');
    }

    protected function getStatusColour($status): string
    {
        return match ($status) {
            OrderItemStatus::PAID->value => 'warning',
            OrderItemStatus::APPROVED->value => 'success',
            OrderItemStatus::CANCELLED->value => 'info',
            OrderItemStatus::RAISED->value => 'secondary',
            default => 'danger',
        };
    }
}
