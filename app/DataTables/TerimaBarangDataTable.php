<?php

namespace App\DataTables;

use App\Models\TerimaBarang;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class TerimaBarangDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'terima_barang.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\TerimaBarang $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(TerimaBarang $model)
    {
        return $model->newQuery()
            ->join('purchase_order', 'terima_barang.purchase_order_id', 'purchase_order.id')
            ->join('pegawai', 'terima_barang.pegawai_id', '=', 'pegawai.id')
            ->join('supplier', 'terima_barang.supplier_id', '=', 'supplier.id')
            ->join('kirim_barang', 'terima_barang.kirim_barang_id', '=', 'kirim_barang.id')
            ->select(
                'terima_barang.*',
                'kirim_barang.kode as kirim_barang_kode',
                'purchase_order.kode as purchase_order_kode',
                'pegawai.nama as pegawai_nama',
                'supplier.nama as supplier_nama'
            );
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
            [
                'data' => 'purchase_order_kode',
                'title' => 'Purchase Order',
                'name' => 'purchase_order.kode'
            ],
            [
                'data' => 'kirim_barang_kode',
                'title' => 'Kirim Barang',
                'name' => 'kirim_barang.kode'
            ],
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
            'tanggal_terima',
            'status',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'terima_barang_datatable_' . time();
    }
}
