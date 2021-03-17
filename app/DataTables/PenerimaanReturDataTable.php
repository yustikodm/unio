<?php

namespace App\DataTables;

use App\Models\PenerimaanRetur;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class PenerimaanReturDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'penerimaan_retur.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\PenerimaanRetur $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(PenerimaanRetur $model)
    {
        return $model->newQuery()
                     ->join('retur_barang', "retur_barang.id", "=", "penerimaan_retur.retur_barang_id")
                     ->join('pegawai', 'penerimaan_retur.pegawai_id', '=', 'pegawai.id')
                     ->join('supplier', 'penerimaan_retur.supplier_id', '=', 'supplier.id')
                     ->select('penerimaan_retur.*', 'retur_barang.kode as kode_retur','pegawai.nama as pegawai_nama', 'supplier.nama as supplier_nama');
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
                'title' => 'Kode Retur',
                'data' => 'kode_retur',
                'name' => 'retur_barang.kode'
            ],
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
            // 'keterangan',
            'tanggal',
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
        return 'penerimaan_retur_datatable_' . time();
    }
}
