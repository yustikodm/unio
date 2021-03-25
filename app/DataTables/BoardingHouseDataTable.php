<?php

namespace App\DataTables;

use App\Models\BoardingHouse;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class BoardingHouseDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'boarding_houses.datatables_actions')
            ->editColumn('country.name', function ($query) {
                return '<a href="' . route('countries.show', $query->country->id) . '">' . $query->country->name . '</a>';
            })
            ->editColumn('state.name', function ($query) {
                return '<a href="' . route('states.show', $query->state->id) . '">' . $query->state->name . '</a>';
            })
            ->editColumn('district.name', function ($query) {
                return '<a href="' . route('districts.show', $query->district->id) . '">' . $query->district->name . '</a>';
            })
            ->editColumn('currency.name', function ($query) {
                return '<a href="' . route('currencies.show', $query->currency->id) . '">' . $query->currency->name . '</a>';
            })
            ->rawColumns(['action', 'country.name', 'state.name', 'district.name', 'currency.name']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\BoardingHouse $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(BoardingHouse $model)
    {
        return $model->newQuery()->with(['country', 'currency', 'state', 'district']);
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
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
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
            Column::make('country.name')->title('Country'),
            Column::make('state.name')->title('State'),
            Column::make('district.name')->title('District'),
            Column::make('currency.name')->title('Currency'),
            Column::make('name')->title('Name'),
            Column::make('price')->title('Price'),
            Column::make('phone')->title('Phone'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'boarding_houses_datatable_' . time();
    }
}
