<?php

namespace App\DataTables;

use App\Models\Vendor;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class VendorDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'vendors.datatables_actions')
            ->editColumn('category.name', function ($query) {
                return '<a href="' . route('vendorCategories.show', $query->category->id) . '">' . $query->category->name . '</a>';
            })
            ->editColumn('picture', function ($query) {
                return '<img src="' . url($query->picture) . '" width="90">';
            })
            ->rawColumns(['action', 'category.name', 'picture']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Vendor $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Vendor $model)
    {
        return $model->newQuery()->with(['category']);
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
            Column::make('name')->title('Vendor Name'),
            Column::make('picture')->title('Logo'),
            Column::make('phone')->title('Phone'),
            Column::make('back_account_number')->title('Bank Account'),
            Column::make('category.name')->title('Category'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'vendors_datatable_' . time();
    }
}
