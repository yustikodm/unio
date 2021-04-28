<?php

namespace App\DataTables;

use App\Models\VendorService;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class VendorServiceDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'vendor_services.datatables_actions')
        ->editColumn('vendor.name', function ($query) {
          return '<a href="' . route('vendors.show', $query->vendor->id) . '">' . $query->vendor->name . '</a>';
        })
        ->rawColumns(['action', 'vendor.name']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\VendorService $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(VendorService $model)
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
            Column::make('description')->title('Description')->width('40%'),
            Column::make('price')->title('Price')->width('10%'),
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
        return 'vendor_services_datatable_' . time();
    }
}
