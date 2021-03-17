<?php

namespace App\DataTables;

use App\Models\Harga;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class HargaDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'harga.datatables_actions')
                         ->addColumn('harga', function ($col) {
                            return "Rp. ".number_format($col['harga']);
                       })->rawColumns(['harga', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Harga $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Harga $model)
    {
        return $model->newQuery()
            ->join('barang', 'barang.id', '=', 'harga.barang_id')
            ->select('harga.*', 'barang.nama as barang_nama');
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
                'data' => 'barang_nama',
                'title' => 'Barang',
                'name' => 'barang.nama'
            ],
            'harga'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'harga_datatable_' . time();
    }
}
