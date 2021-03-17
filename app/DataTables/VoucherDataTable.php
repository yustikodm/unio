<?php

namespace App\DataTables;

use App\Models\Voucher;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class VoucherDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'voucher.datatables_actions')
                         ->editColumn('diskon', function ($col) {
                                if($col['tipe'] == 'rupiah'){
                                    return "Rp. ".number_format($col['diskon']);
                                }else{
                                    return $col['diskon']."%";
                                }
                       })->rawColumns(['diskon', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Voucher $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Voucher $model)
    {
        return $model->newQuery()
                     ->join('jabatan', 'jabatan.id', '=', 'voucher.jabatan_id')
                     ->select('voucher.*', 'jabatan.nama as jabatan_nama');
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
            'kadaluarsa',
            'diskon',
            'tipe',
            [
                'data' => 'jabatan_nama',
                'title'  => 'Untuk Jabatan',
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
        return 'voucher_datatable_' . time();
    }
}
