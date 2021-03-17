<?php

namespace App\DataTables;

use App\Models\Barang;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class BarangDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'barang.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Barang $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Barang $model)
    {
        return $model->newQuery()
            ->join('satuan_barang', 'satuan_barang.id', '=', 'barang.satuan_id')
            ->join('kategori_barang', 'kategori_barang.id', '=', 'barang.kategori_id')
            ->join('subkategori_barang', 'subkategori_barang.id', '=', 'barang.subkategori_id')
            ->select(
                'barang.*',
                'satuan_barang.nama as satuan_barang_nama',
                'kategori_barang.nama as kategori_barang_nama',
                'subkategori_barang.nama as subkategori_barang_nama'
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
            'nama',
            [
                'data' => 'satuan_barang_nama',
                'title' => 'Satuan',
                'name' => 'satuan_barang.nama'
            ],
            [
                'data' => 'kategori_barang_nama',
                'title' => 'Kategori',
                'name' => 'kategori_barang.nama'
            ],
            [
                'data' => 'subkategori_barang_nama',
                'title' => 'Subkategori',
                'name' => 'subkategori_barang.nama'
            ],
            'tipe'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'barang_datatable_' . time();
    }
}
