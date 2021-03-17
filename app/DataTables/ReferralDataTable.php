<?php

namespace App\DataTables;

use App\Models\Referral;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class ReferralDataTable extends DataTable
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

        // return $dataTable->addColumn('action', 'referral.datatables_actions');
        return $dataTable;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Referral $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Referral $model)
    {
        return $model->newQuery()
            ->join('mitra AS parent', 'parent.id', '=' ,'referral.parent_id')
            ->join('mitra AS child', 'child.id' ,'=', 'referral.child_id')
            ->join('pelanggan AS parent_name', 'parent.pelanggan_id', '=', 'parent_name.id')
            ->join('pelanggan AS child_name', 'child.pelanggan_id', '=', 'child_name.id')
            ->select('parent_name.nama as parent_nama' , 'child_name.nama as child_nama');
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
                'data' => 'parent_nama',
                'title' => 'Parent',
                'name' => 'parent_name.nama'
            ],
            [
                'data' => 'child_nama',
                'title' => 'Child',
                'name' => 'child_name.nama'
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
        return 'referral_datatable_' . time();
    }
}
