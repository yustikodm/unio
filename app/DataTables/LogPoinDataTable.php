<?php

namespace App\DataTables;

use App\Models\LogPoin;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class LogPoinDataTable extends DataTable
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

        // return $dataTable->addColumn('action', 'log_poin.datatables_actions');
        return $dataTable;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\LogPoin $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(LogPoin $model)
    {
        if (Auth::user()->hasRole('admin')) {
            return $model->newQuery()
                ->join('mitra', 'log_poin.mitra_id', '=', 'mitra.id')
                ->join('pelanggan', 'mitra.pelanggan_id', 'pelanggan.id')
                ->select('log_poin.*', 'pelanggan.nama as mitra_nama');
        } else if (Auth::user()->hasRole('mitra')) {
            return $model->newQuery()
                ->join('mitra', 'log_poin.mitra_id', '=', 'mitra.id')
                ->select('log_poin.*', 'mitra.user_id')
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
                'jumlah',
                [
                    'data' => 'created_at',
                    'title' => 'Tanggal',
                    'name' => 'created_at'
                ]
            ];
        } else if (Auth::user()->hasRole('mitra')) {
            return [
                'keterangan',
                'jumlah',
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
        return 'log_poin_datatable_' . time();
    }
}
