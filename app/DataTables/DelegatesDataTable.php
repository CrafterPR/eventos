<?php

namespace App\DataTables;

use App\Enum\UserType;
use App\Models\User;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use function Clue\StreamFilter\fun;

class DelegatesDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->rawColumns(['user', 'last_login_at', 'created_at'])
            ->editColumn('name', function (User $user) {
                return $user->name;
            })
            ->editColumn('created_at', function (User $user) {
                return format_date($user->created_at);
            })
           ->editColumn('institution', function (User $user) {
               return $user->institution;
           })

            ->editColumn('gender', function (User $user) {
                return $user->gender;
            })

            ->editColumn('country', function (User $user) {
                return $user->country->name;
            })
            ->editColumn('category_id', function (User $user) {
                return $user->category->title;
            })
           ->addColumn('action', function (User $user) {
               return view('pages.apps.delegates.columns._actions', compact('user'));
           })
                ->setRowId('id');
    }


    /**
     * Get the query source of dataTable.
     */
    public function query(User $model): QueryBuilder
    {
        return $model->with('country', 'category')
            ->where('user_type', '!=', 'staff')
            ->orderBy('created_at', 'DESC')
        ->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('delegates-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('rt' . "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'p>>", )
            ->addTableClass('table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer text-gray-600 fw-semibold')
            ->setTableHeadClass('text-start text-muted fw-bold fs-7 text-uppercase gs-0')
            ->orderBy(2)
            ->drawCallback("function() {" . file_get_contents(resource_path('views/pages/apps/delegates/columns/_draw-scripts.js')) . "}");
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('name')->addClass('align-items-center')->title('name')->name('first_name'),
            Column::make('salutation')->addClass('align-items-center')->title('salutation')->name('salutation')->hidden(),
            Column::make('first_name')->addClass('align-items-center')->title('first_name')->name('first_name')->hidden(),
            Column::make('last_name')->addClass('align-items-center')->title('last_name')->name('last_name')->hidden(),
            Column::make('created_at')->addClass('align-items-center')->title('Date registered')->name('created_at'),
            Column::make('email')->addClass('align-items-center')->title('Email')->name('email'),
            Column::make('institution')->addClass('align-items-center')->title('Organization')->name('institution'),
            Column::make('category_id')->addClass('align-items-center')->title('Category')->name('category.title'),
            Column::make('gender')->addClass('align-items-center')->title('Gender'),
            Column::make('country')->addClass('align-items-center')->title('Country')->name('country.name'),
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
        return 'Users_' . date('YmdHis');
    }
}
