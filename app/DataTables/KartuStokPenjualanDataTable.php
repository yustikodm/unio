<?php

namespace App\DataTables;

use App\Models\KartuStokPenjualan;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class KartuStokPenjualanDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'kartu_stok_penjualan.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\KartuStokPenjualan $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(KartuStokPenjualan $model)
    {
        return $model->newQuery()
            ->join('barang', 'kartu_stok_penjualan.barang_id', '=', 'barang.id')
            ->join('penjualan', 'kartu_stok_penjualan.penjualan_id', '=', 'penjualan.id')
            ->select(
                'kartu_stok_penjualan.*',
                'barang.nama as barang_nama',
                'penjualan.kode as penjualan_kode'
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
                'data' => 'penjualan_kode',
                'title' => 'Penjualan',
                'name' => 'penjualan.kode'
            ],
            'stok_awal',
            'masuk',
            'keluar',
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
        return 'kartu_stok_penjualan_datatable_' . time();
    }
}
