<?php

namespace App\DataTables;

use App\Models\Wishlist;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class WishlistDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'wishlists.datatables_actions')
        ->editColumn('university.name', function ($query) {
            return '<a href="' . route('universities.show', $query->university->id) . '">' . $query->university->name . '</a>';
        })
        ->editColumn('major.name', function ($query) {
            return '<a href="' . route('university-majors.show', $query->major->id) . '">' . $query->major->name . '</a>';
        })
        ->editColumn('service.name', function ($query) {
            return '<a href="' . route('vendor-services.show', $query->service->id) . '">' . $query->service->name . '</a>';
        })
        ->editColumn('user.username', function ($query) {
            return '<a href="' . route('users.show', $query->user->id) . '">' . $query->user->username . '</a>';
        })
        ->rawColumns(['action', 'university.name', 'major.name', 'service.name', 'user.username']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Wishlist $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Wishlist $model)
    {
        return $model->newQuery()->with(['university', 'major', 'service', 'user']);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('university.name')->title('University'),
            Column::make('major.name')->title('Major'),
            Column::make('service.name')->title('Service'),
            Column::make('user.username')->title('Author'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'wishlists_datatable_' . time();
    }
}
