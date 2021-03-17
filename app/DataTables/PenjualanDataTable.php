<?php

namespace App\DataTables;

use App\Models\Penjualan;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class PenjualanDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'penjualan.datatables_actions')
                        //  ->editColumn('ongkir', function ($col) {
                        //     return "Rp. ".number_format($col['ongkir']);
                        // })
                         ->editColumn('bayar', function ($col) {
                            return "Rp. ".number_format($col['bayar']);
                        })
                         ->editColumn('total', function ($col) {
                            return "Rp. ".number_format($col['total']);
                        })
                        ->rawColumns(['bayar','total', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Penjualan $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Penjualan $model)
    {
        return $model->newQuery()
            ->leftJoin('pelanggan', 'penjualan.pelanggan_id', '=', 'pelanggan.id')
            ->leftJoin('voucher', 'voucher.id', '=', 'penjualan.voucher_id')
            ->select('penjualan.*', 'pelanggan.nama as pelanggan_nama', 'voucher.kode as kode_voucher')
            ->where('penjualan.status', 'Dibayar');
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
    public function getColumns()
    {
        return [
            'kode',
            [
                'data' => 'pelanggan_nama',
                'title' => 'Pelanggan',
                'name' => 'pelanggan.nama'
            ],
            'total',
            'bayar',
            [
                'data' => 'created_at',
                'title' => 'Tanggal',
                'name' => 'created_at'
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
        return 'penjualan_datatable_' . time();
    }
}
