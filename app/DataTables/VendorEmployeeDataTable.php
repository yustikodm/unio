<?php

namespace App\DataTables;

use App\Models\VendorEmployee;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class VendorEmployeeDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'vendor_employees.datatables_actions')
        ->editColumn('vendor.name', function ($query) {
          return '<a href="' . route('vendors.show', $query->vendor->id) . '">' . $query->vendor->name . '</a>';
        })
        ->editColumn('email', function ($query) {
          return '<a href="mailto:' .$query->email . '">' . $query->email . '</a>';
        })
        ->rawColumns(['action', 'vendor.name', 'email']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\VendorEmployee $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(VendorEmployee $model)
    {
        return $model->newQuery()->with(['vendor'])->orderBy('name', 'asc');
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
            Column::make('name')->title('Name')->width('20%'),
            Column::make('position')->title('Position')->width('10%'),
            Column::make('phone')->title('Phone')->width('20%'),
            Column::make('email')->title('Email')->width('20%'),
            Column::make('vendor.name')->title('Vendor')->width('20%'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'vendor_employees_datatable_' . time();
    }
}
