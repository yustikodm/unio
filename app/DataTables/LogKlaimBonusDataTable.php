<?php

namespace App\DataTables;

use App\Models\LogKlaimBonus;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Illuminate\Support\Facades\Auth;

class LogKlaimBonusDataTable extends DataTable
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

        // return $dataTable->addColumn('action', 'log_klaim_bonus.datatables_actions');
        return $dataTable->editColumn('jumlah', function ($col) {
                return "Rp. ".number_format($col['jumlah']);
            })->rawColumns(['jumlah']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\LogKlaimBonus $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(LogKlaimBonus $model)
    {
        if (Auth::user()->hasRole('mitra')) {
            return $model->newQuery()
                    ->join('mitra', 'mitra.id', '=', 'log_klaim_bonus.mitra_id')
                    ->join('pelanggan', 'mitra.pelanggan_id', '=', 'pelanggan.id')
                    ->select('log_klaim_bonus.*', 'pelanggan.nama as mitra_nama')
                    ->where('mitra.user_id', Auth::id());
        } else if (Auth::user()->hasRole('admin')) {
         return $model->newQuery()
                    ->join('mitra', 'mitra.id', '=', 'log_klaim_bonus.mitra_id')
                    ->join('pelanggan', 'mitra.pelanggan_id', '=', 'pelanggan.id')
                    ->select('log_klaim_bonus.*', 'pelanggan.nama as mitra_nama');
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
        return [
            [
                'data' => 'mitra_nama',
                'title' => 'Nama Mitra',
                'name' => 'pelanggan.nama'
            ],
            'keterangan',
            [
                'title' => 'Jumlah',
                'data' => 'jumlah',
                'name' => 'jumlah'
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
        return 'log_klaim_bonus_datatable_' . time();
    }
}
