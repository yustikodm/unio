<?php

namespace App\DataTables;

use App\Models\PurchaseOrder;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class PurchaseOrderDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'purchase_order.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\PurchaseOrder $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(PurchaseOrder $model)
    {
        return $model->newQuery()
            ->join('pegawai', 'purchase_order.pegawai_id', '=', 'pegawai.id')
            ->join('supplier', 'purchase_order.supplier_id', '=', 'supplier.id')
            ->select('purchase_order.*', 'pegawai.nama as pegawai_nama', 'supplier.nama as supplier_nama');
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
            'kode',
            [
                'data' => 'pegawai_nama',
                'title' => 'Admin',
                'name' => 'pegawai.nama'
            ],
            [
                'data' => 'supplier_nama',
                'title' => 'Supplier',
                'name' => 'supplier.nama'
            ],
            'tanggal_diproses',
            'status'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'purchase_order_datatable_' . time();
    }
}
