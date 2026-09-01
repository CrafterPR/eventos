<?php

namespace App\Http\Livewire\Events;

use App\Enum\CategoryStatus;
use App\Enum\EventStatus;
use App\Models\PurchaseOrder;
use App\Exports\DelegateExport;
use App\Models\Category;
use App\Models\Delegate;
use App\Models\Event;
use App\Exports\PurchaseExport;
use App\Enum\PurchaseOrderStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Facades\Excel;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\MultiSelectFilter;

class PurchasedTickets extends DataTableComponent
{
    public function bulkActions(): array
    {
        return [
            'export' => 'Export',
        ];
    }

    public function export()
    {
        $po = $this->getSelected();

        $this->clearSelected();

        return Excel::download(new PurchaseExport($po), 'purchased_tickets.xlsx');
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setFooterEnabled();
        $this->setComponentWrapperAttributes([
                                                 'id' => 'purchased-tickets-table',
                                                 'class' => 'table table-responsive table-hover table-striped',
                                             ]);
        $this->setActionsInToolbarEnabled();
        $this->setColumnSelectStatus(false);
        $this->setBulkActionsMenuAttributes([
                                                'class' => 'px-n20',
                                                'default-colors' => true,
                                                'default-styling' => true,
                                            ]);
        $this->setBulkActionsMenuItemAttributes([
                                                    'class' => 'bg-green-500',
                                                    'default-colors' => true,
                                                    'default-styling' => true,
                                                ]);

        $this->setLoadingPlaceholderStatus(true);
    }

    public function builder(): Builder
    {
        return PurchaseOrder::query()
                       ->select('purchase_orders.*')
                       ->with('user', 'pesaflow_request')
                       ->orderBy('purchase_orders.created_at', 'desc');
    }

    public function columns(): array
    {
        return [
            Column::make('Reference', 'reference')
                  ->searchable(fn(Builder $query, $searchTerm) => $query
                      ->orWhere('reference', 'LIKE', "%{$searchTerm}%")
                  )
                  ->view('pages.apps.event-management.columns._reference'),
            Column::make('Delegate', 'user.first_name')
                ->searchable(fn(Builder $query, $searchTerm) => $query
                    ->orWhere('user.last_name', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('user.email', 'LIKE', "%{$searchTerm}%")
                )
                  ->view('pages.apps.event-management.columns._user'),
            Column::make('Organization','user.organization')->searchable()->sortable(),

            Column::make('Amount', 'amount')
                  ->sortable()
                  ->setView('pages.apps.event-management.columns._amount')
                  ->footer(function ($rows) {
                      $totalPaid = $rows
                          ->where('status', PurchaseOrderStatus::PAID)
                          ->sum('amount');

                      $totalPending = $rows
                          ->where('status', PurchaseOrderStatus::NEW)
                          ->sum('amount');

                      return "PENDING: " . number_format($totalPending, 2, '.', ',')
                          . "\n"
                          . "PAID: " . number_format($totalPaid, 2, '.', ',');
                  }),
            Column::make('Tickets','tickets')->sortable()->searchable()
                ->view('pages.apps.event-management.columns._tickets'),
            Column::make('Status','status')->sortable()
                ->view('pages.apps.event-management.columns._status'),
            Column::make('Actions', 'id')
                  ->view('pages.apps.event-management.columns._manage_actions')

        ];
    }

    public function filters(): array
    {
        return [
            SelectFilter::make('Payment status', 'status')
                        ->options([
                                      '' => 'Any',
                                      ...collect(PurchaseOrderStatus::cases())
                                          ->mapWithKeys(fn ($status) => [
                                              $status->value => $status->label()
                                          ])
                                          ->toArray()
                                  ])
                        ->filter(function(Builder $builder, string $value) {
                            return $builder->where('purchase_orders.status', $value);
                        }),
            MultiSelectFilter::make('Ticket type')
                             ->options([
                                           ...$this->getCategories(),
                                       ])
                             ->filter(function (Builder $builder, array $values) {
                                 $builder->where(function (Builder $query) use ($values) {
                                     foreach ($values as $value) {
                                         $query->orWhereRaw(
                                             "JSON_SEARCH(tickets, 'one', ?, NULL, '$[*].type') IS NOT NULL",
                                             [$value]
                                         );
                                     }
                                 });
                             }),
        ];
    }


    private function getCategories(): Collection
    {
        return Category::query()
                       ->where('status', CategoryStatus::ACTIVE)
                       ->pluck('title', 'title');
    }
}
