<?php

namespace App\DataTables;

use App\Models\Bonus;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class BonusDataTable extends DataTable
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

        // return $dataTable->addColumn('action', 'bonus.datatables_actions');
        return $dataTable->editColumn('bonus', function ($col) {
                            return "Rp. ".number_format($col['bonus']);
                       })->rawColumns(['bonus']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Bonus $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Bonus $model)
    {
        return $model->newQuery()
                ->join('mitra', 'mitra.id', '=', 'bonus.mitra_id')
                ->join('pelanggan', 'mitra.pelanggan_id', '=', 'pelanggan.id')
                ->select('bonus.*', 'pelanggan.nama as mitra_nama');
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
            // ->addAction(['width' => '120px', 'printable' => false])
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
                'data' => 'mitra_nama',
                'title' => 'Mitra',
                'name' => 'pelanggan.nama'
            ],
            [
                'data' => 'bonus',
                'title' => 'Bonus',
                'name' => 'bonus'
            ],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'bonus_datatable_' . time();
    }
}
