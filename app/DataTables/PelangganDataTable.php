<?php

namespace App\DataTables;

use App\Models\Pelanggan;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Illuminate\Support\Facades\DB;

class PelangganDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'pelanggan.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Pelanggan $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Pelanggan $model)
    {
        return $model->newQuery()
            // ->with(['kota']);
            ->join('pekerjaan', 'pekerjaan.id', '=', 'pelanggan.pekerjaan_id')
            ->join('kota', 'kota.id', '=', 'pelanggan.kota_id')
            ->select(
                'pelanggan.*',
                'pekerjaan.nama as pekerjaan_nama',
                'kota.nama as kota_nama'
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
                'order'     => false,
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
            // 'nomor_ktp',
            [
                'data' => 'nama',
                'title' => 'Nama',
                'name' => 'nama'
            ],
            'jenis_kelamin',
            [
                'title' => 'Tanggal Lahir',
                'data' => 'lahir_tanggal',
            ],
            [
                'data' => 'pekerjaan_nama',
                'title' => 'Pekerjaan',
                'name' => 'pekerjaan.nama'
            ],
            [
                'data' => 'kota_nama',
                'title' => 'Kota',
                'name' => 'kota.nama'
            ],
            'alamat',
            // 'telepon',
            'hp',
            // 'tanggal_daftar'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'pelanggan_datatable_' . time();
    }
}
