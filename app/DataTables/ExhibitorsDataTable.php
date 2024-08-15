<?php

namespace App\DataTables;

use App\Enum\UserType;
use App\Models\User;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class ExhibitorsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->rawColumns(['user', 'affiliation_id', 'country_id', 'institution', 'position'])
            ->editColumn('name', function (User $user) {
                return $user->name;
            })
            ->editColumn('institution', function (User $user) {
                return $user->institution;
            })
            ->editColumn('position', function (User $user) {
                return $user->position;
            })

            ->editColumn('gender', function (User $user) {
                return $user->gender;
            })

            ->editColumn('disability', function (User $user) {
                return $user->disability;
            })

            ->editColumn('affiliation_id', function (User $user) {
                return $user->affiliation?->name;
            })

            ->editColumn('country_id', function (User $user) {
                return $user->country?->name;
            })

            ->editColumn('areas_of_interest', function (User $user) {
                return $user->area_of_interest;
            })

            ->addColumn('action', function (User $user) {
                return view('pages.apps.user-management.users.columns._actions', compact('user'));
            })
            ->setRowId('id');
    }


    /**
     * Get the query source of dataTable.
     */
    public function query(User $model): QueryBuilder
    {
        return $model->where('user_type', UserType::EXHIBITOR)
            ->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('exhibitors-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('rt' . "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'p>>", )
            ->addTableClass('table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer text-gray-600 fw-semibold')
            ->setTableHeadClass('text-start text-muted fw-bold fs-7 text-uppercase gs-0')
            ->orderBy(2)
            ->drawCallback("function() {" . file_get_contents(resource_path('views/pages//apps/user-management/users/columns/_draw-scripts.js')) . "}");
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('name')->addClass('align-items-center')->title('Name')->name('first_name'),
            Column::make('institution')->addClass('align-items-center')->title('Institution'),
            Column::make('position')->addClass('align-items-center')->title('Position'),
            Column::make('gender')->addClass('align-items-center')->title('Gender'),
            Column::make('disability')->addClass('align-items-center')->title('Disabled?'),
            Column::make('affiliation_id')->addClass('align-items-center')->title('Affiliation'),
            Column::make('country_id')->addClass('align-items-center')->title('Country')->name('country_id'),
            Column::make('area_of_interest')->addClass('align-items-center')->title('Areas of Interests '),
            Column::computed('action')
                ->addClass('text-end text-nowrap')
                ->exportable(true)
                ->printable(true)
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
