<?php

namespace App\DataTables;

use App\Models\ReturBarang;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class ReturBarangDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'retur_barang.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ReturBarang $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ReturBarang $model)
    {
        return $model->newQuery()
            ->join('pegawai', 'retur_barang.pegawai_id', '=', 'pegawai.id')
            ->join('supplier', 'retur_barang.supplier_id', '=', 'supplier.id')
            ->select(
                'retur_barang.*',
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
            'tanggal',
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
        return 'retur_barang_datatable_' . time();
    }
}
