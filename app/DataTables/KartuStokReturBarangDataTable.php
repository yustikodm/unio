<?php

namespace App\DataTables;

use App\Models\KartuStokReturBarang;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class KartuStokReturBarangDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'kartu_stok_retur_barang.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\KartuStokReturBarang $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(KartuStokReturBarang $model)
    {
        return $model->newQuery()
            ->join('barang', 'kartu_stok_retur_barang.barang_id', '=', 'barang.id')
            ->join('retur_barang', 'kartu_stok_retur_barang.retur_barang_id', '=', 'retur_barang.id')
            ->select(
                'kartu_stok_retur_barang.*',
                'barang.nama as barang_nama',
                'retur_barang.kode as retur_barang_kode'
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
                    // ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
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
                'data' => 'barang_nama',
                'title' => 'Barang',
                'name' => 'barang.nama'
            ],
            [
                'data' => 'retur_barang_kode',
                'title' => 'Retur Barang',
                'name' => 'retur_barang.kode'
            ],
            'stok_awal',
            'retur',
            'stok_akhir',
            'tanggal'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'kartu_stok_retur_barang_datatable_' . time();
    }
}
