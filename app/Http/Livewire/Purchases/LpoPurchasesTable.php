<?php

namespace App\Http\Livewire\Purchases;

use App\Models\PurchaseOrder;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PurchaseExport;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateRangeFilter;

class LpoPurchasesTable extends DataTableComponent
{
    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setComponentWrapperAttributes([
            'id' => 'lpo-purchases-table',
            'class' => 'table table-responsive table-hover table-striped',
        ]);
        $this->setFooterEnabled();
    }

    public function builder(): Builder
    {
        return PurchaseOrder::query()
            ->with('user')
            ->where('payment_method', 'lpo')
            ->orderBy('updated_at', 'desc');
    }

    public function bulkActions(): array
    {
        return [
            'export' => 'Export',
        ];
    }

    public function export()
    {
        // Build query with current filters applied
        $query = $this->builder();

        // lpo_status filter
        try {
            $lpoStatus = $this->getFilterByKey('lpo_status');
        } catch (\Throwable $e) {
            $lpoStatus = null;
        }
        if ($lpoStatus) {
            $query->where('status', $lpoStatus);
        }

        // ticket_type filter
        try {
            $ticketType = $this->getFilterByKey('ticket_type');
        } catch (\Throwable $e) {
            $ticketType = null;
        }
        if ($ticketType) {
            $query->where(function($q) use ($ticketType) {
                $q->whereJsonContains('tickets->*.category_id', (int) $ticketType)
                  ->orWhereJsonContains('tickets->*.category_id', (string) $ticketType);
            });
        }

        // payment_date filter (date range)
        try {
            $paymentDate = $this->getFilterByKey('payment_date');
        } catch (\Throwable $e) {
            $paymentDate = null;
        }
        if (is_array($paymentDate)) {
            $start = $paymentDate['start'] ?? null;
            $end = $paymentDate['end'] ?? null;
            if ($start) $query->whereDate('updated_at', '>=', $start);
            if ($end) $query->whereDate('updated_at', '<=', $end);
        }

        $ids = $query->pluck('id')->toArray();
        $this->clearSelected();
        return Excel::download(new PurchaseExport($ids), 'lpo-purchases.xlsx');
    }

    public function columns(): array
    {
        return [
            Column::make('Reference', 'reference')->searchable()->sortable(),
            Column::make('Purchaser')
                ->format(function($value, $column, $row) {
                    return trim(($row->user?->first_name ?? '') . ' ' . ($row->user?->last_name ?? '')) ?: ($row->payment_email ?? '');
                }),
            Column::make('Email', 'payment_email')->format(fn($v, $c, $row) => $row->payment_email ?? $row->user?->email),
            Column::make('Phone')->format(fn($v, $c, $row) => $row->payment_phone ?? $row->user?->mobile ?? ''),
            Column::make('Organization')->format(fn($v, $c, $row) => $row->user?->organization ?? ''),
            Column::make('Amount', 'amount')->format(fn($v) => number_format($v, 2)),
            Column::make('Status', 'status')->format(fn($v) => (string) $v),
            Column::make('Ticket types')->format(function($value, $column, $row) {
                $tickets = is_array($row->tickets) ? $row->tickets : (json_decode($row->tickets, true) ?: []);
                $types = [];
                $map = $this->getCategories();
                foreach ($tickets as $t) {
                    if (is_array($t)) {
                        if (!empty($t['category_id'])) {
                            $types[] = $map->get($t['category_id'], 'Category: ' . ($t['category_id']));
                        } elseif (!empty($t['type'])) {
                            $types[] = $t['type'];
                        }
                    }
                }
                return implode(', ', array_unique($types));
            }),
            Column::make('Payment date', 'updated_at')->format(fn($v) => optional($v)->toDateTimeString()),
            Column::make('Actions')->view('pages.purchases.columns._lpo_actions'),
        ];
    }

    public function filters(): array
    {
        return [
            SelectFilter::make('LPO payment status', 'lpo_status')
                ->options([
                    '' => 'Any',
                    'new' => 'Pending',
                    'paid' => 'Approved',
                    'failed' => 'Failed',
                ])
                ->filter(function(Builder $builder, string $value) {
                    return $builder->where('status', $value);
                }),

            SelectFilter::make('Ticket type', 'ticket_type')
                ->options([
                    '' => 'Any',
                    ...$this->getCategories()->toArray(),
                ])
                ->filter(function(Builder $builder, string $value) {
                    // filter orders where any ticket has category_id == $value
                    return $builder->where(function($q) use ($value) {
                        $q->whereJsonContains('tickets->*.category_id', (int) $value)
                          ->orWhereJsonContains('tickets->*.category_id', (string) $value);
                    });
                }),

            DateRangeFilter::make('Payment date', 'payment_date')
                ->filter(function(Builder $builder, array $value) {
                    // $value is ['start' => 'YYYY-MM-DD', 'end' => 'YYYY-MM-DD']
                    $start = $value['start'] ?? null;
                    $end = $value['end'] ?? null;
                    if ($start) {
                        $builder->whereDate('updated_at', '>=', $start);
                    }
                    if ($end) {
                        $builder->whereDate('updated_at', '<=', $end);
                    }
                    return $builder;
                }),
        ];
    }

    private function getCategories(): Collection
    {
        return Category::query()->pluck('title', 'id');
    }
}
