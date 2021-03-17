<?php

namespace App\DataTables;

use App\Models\Mitra;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class MitraDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'mitra.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Mitra $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Mitra $model)
    {
        return $model->newQuery()->with('pelanggan')
            ->join('level_mitra', 'mitra.level_mitra_id', '=', 'level_mitra.id')
            ->select('mitra.*', 'level_mitra.nama as level_mitra_nama');
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
               'data' => 'pelanggan.nama',
               'title' => 'Nama',
               'name' => 'pelanggan.nama'
            ],
            [
               'data' => 'level_mitra_nama',
               'title' => 'Level',
               'name' => 'level_mitra.nama'
            ],
            'tanggal_mulai',
            'tanggal_akhir'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'mitra_datatable_' . time();
    }
}
