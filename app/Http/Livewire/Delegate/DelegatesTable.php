<?php

namespace App\Http\Livewire\Delegate;

use App\Enum\CategoryStatus;
use App\Enum\EventStatus;
use App\Models\Category;
use App\Models\Delegate;
use App\Models\Event;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class DelegatesTable extends DataTableComponent
{

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setFooterEnabled();
        $this->setComponentWrapperAttributes([
            'id' => 'delegates-table',
            'class' => 'table table-responsive table-hover table-striped',
        ]);
        $this->setActionsInToolbarEnabled();
        $this->setColumnSelectStatus(false);
    }

    public function builder(): Builder
    {
        return Delegate::query()
            ->select('delegates.*')
            ->with('event', 'country', 'category')
             ->orderBy('delegates.updated_at', 'desc');
    }

    public function columns(): array
    {
            return [
            Column::make('Name', 'first_name')
                ->view('pages.apps.delegates.columns._user'),
            Column::make('Organization','organization')->sortable(),
            Column::make('Event name','event.title')->sortable(),
            Column::make('Delegate Category','category.title')->sortable(),
            Column::make('Country','country.name')->sortable(),
            BooleanColumn::make('Is pass printed?', 'pass_printed')
                ->setView('pages.apps.delegates.columns.printed_status')
                ->footer(function($rows) {
                    $printed = $this->getFilterByKey('print_status');
                    return 'Total: ' . $rows->when($printed, function($q) use ($printed) {
                            $q->where('pass_printed', $printed);
                        })->count();
                }),
            Column::make('Times printed','print_count'),
                Column::make('Actions', 'id')
                    ->view('pages.apps.delegates.columns._actions'),
        ];
    }

    public function filters(): array
    {
        return [
            SelectFilter::make('Event')
                ->options([
                    '' => 'All events',
                    ...$this->getEvents(),
                ])
                ->filter(function(Builder $builder, string $value) {
                   return $builder->where('event_id', $value);
                }),
            SelectFilter::make('Category')
                ->options([
                    '' => 'All categories',
                    ...$this->getCategories(),
                ])
                ->filter(function(Builder $builder, string $value) {
                    return $builder->where('category_id', $value);
                }),
            SelectFilter::make('Print status', 'print_status')
                ->options([
                    '' => 'Any',
                    '1' => 'Printed',
                    '0' => 'Pending',
                ])
                ->filter(function(Builder $builder, string $value) {
                    return $builder->where('pass_printed', $value);
                }),
        ];
    }


    private function getEvents(): Collection
    {
        return Event::query()
            ->where('status', EventStatus::ACTIVE)
            ->pluck('title', 'id');
    }

    private function getCategories(): Collection
    {
        return Category::query()
            ->where('status', CategoryStatus::ACTIVE)
            ->pluck('title', 'id');
    }
}
