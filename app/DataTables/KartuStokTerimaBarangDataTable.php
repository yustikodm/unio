<?php

namespace App\DataTables;

use App\Models\KartuStokTerimaBarang;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class KartuStokTerimaBarangDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'kartu_stok_terima_barang.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\KartuStokTerimaBarang $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(KartuStokTerimaBarang $model)
    {
        return $model->newQuery()
            ->join('barang', 'kartu_stok_terima_barang.barang_id', '=', 'barang.id')
            ->join('terima_barang', 'kartu_stok_terima_barang.terima_barang_id', '=', 'terima_barang.id')
            ->select(
                'kartu_stok_terima_barang.*',
                'barang.nama as barang_nama',
                'terima_barang.kode as terima_barang_kode'
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
                'data' => 'terima_barang_kode',
                'title' => 'Terima Barang',
                'name' => 'terima_barang.kode'
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
        return 'kartu_stok_terima_barang_datatable_' . time();
    }
}
