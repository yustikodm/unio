<?php

namespace App\DataTables;

use App\Models\LogBonus;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class LogBonusDataTable extends DataTable
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

        // return $dataTable->addColumn('action', 'log_bonus.datatables_actions');
        return $dataTable->editColumn('jumlah', function ($col) {
                            return "Rp. ".number_format($col['jumlah']);
                       })->rawColumns(['jumlah']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\LogBonus $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(LogBonus $model)
    {


        if (Auth::user()->hasRole('admin')) {
            return $model->newQuery()
                ->join('mitra', 'mitra.id', '=', 'log_bonus.mitra_id')
                ->join('pelanggan', 'mitra.pelanggan_id', '=', 'pelanggan.id')
                ->join('mitra as referral', 'referral.id', '=', 'log_bonus.nama_referral')
                ->join('pelanggan as namaref', 'namaref.id', '=','referral.pelanggan_id')
                ->select('log_bonus.*', 'pelanggan.nama as mitra_nama', 'namaref.nama as referral_nama');
        } else if (Auth::user()->hasRole('mitra')) {
            return $model->newQuery()
                ->join('mitra', 'mitra.id', '=', 'log_bonus.mitra_id')
                ->join('pelanggan', 'mitra.pelanggan_id', '=', 'pelanggan.id')
                ->join('mitra as referral', 'referral.id', '=', 'log_bonus.nama_referral')
                ->join('pelanggan as namaref', 'namaref.id', '=','referral.pelanggan_id')
                ->select('log_bonus.*', 'pelanggan.nama as mitra_nama', 'namaref.nama as referral_nama')
                ->where('mitra.user_id', Auth::user()->id);
        }
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
        if (Auth::user()->hasRole('admin')) {
            return [
                [
                    'data' => 'mitra_nama',
                    'title' => 'Mitra',
                    'name' => 'pelanggan.nama'
                ],
                'keterangan',
                'kode_transaksi',
                [
                    'data' => 'referral_nama',
                    'title' => 'Nama Referral',
                    'name' => 'namaref.nama'
                ],
                [
                    'title' => 'Jumlah',
                    'data' => 'jumlah',
                    'name' => 'jumlah'
                ],
                [
                    'data' => 'created_at',
                    'title' => 'Tanggal',
                    'name' => 'created_at'
                ]
            ];
        } else if (Auth::user()->hasRole('mitra')) {
            return [
                'keterangan',
                'kode_transaksi',
                [
                    'data' => 'referral_nama',
                    'title' => 'Nama Referral',
                    'name' => 'namaref.nama'
                ],
                [
                    'title' => 'Jumlah',
                    'data' => 'jumlah',
                    'name' => 'jumlah'
                ],
                [
                    'data' => 'created_at',
                    'title' => 'Tanggal',
                    'name' => 'created_at'
                ]
            ];
        }
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'log_bonus_datatable_' . time();
    }
}
