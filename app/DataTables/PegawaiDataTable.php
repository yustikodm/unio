<?php

namespace App\DataTables;

use App\Models\Pegawai;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class PegawaiDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'pegawai.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Pegawai $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Pegawai $model)
    {
        return $model->newQuery()
            ->join('jabatan', 'pegawai.jabatan_id', '=', 'jabatan.id')
            ->select('pegawai.*', 'jabatan.nama as jabatan_nama');
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
            'tanggal_lahir',
            'alamat',
            'telepon',
            [
                'data' => 'jabatan_nama',
                'title' => 'Jabatan',
                'name' => 'jabatan.nama'
            ]
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'pegawai_datatable_' . time();
    }
}
