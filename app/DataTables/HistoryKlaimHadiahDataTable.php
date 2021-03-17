<?php

namespace App\DataTables;

use App\Models\HistoryKlaimHadiah;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Illuminate\Support\Facades\Auth;

class HistoryKlaimHadiahDataTable extends DataTable
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
        // return new EloquentDataTable($query);
        return $dataTable->editColumn('status', function($col){
            if($col['status'] == 'Diajukan'){
                return '<span class="badge bg-default"> Diajukan </span>';
            }else if($col['status'] == 'Diproses'){
                return '<span class="badge bg-blue">Diproses</span>';
            }else if($col['status'] == 'Disetujui'){
                return '<span class="badge bg-green">Disetujui</span>';
            }else if($col['status'] == 'Ditolak'){
                return '<span class="badge bg-red">Ditolak</span>';
            }
            })->rawColumns(['status']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\HistoryKlaimHadiah $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(HistoryKlaimHadiah $model)
    {
        if (Auth::user()->hasRole('mitra')) {
            return $model->newQuery()
                    ->join('hadiah', 'hadiah.id', '=','history_klaim_hadiah.hadiah_id')
                    ->join('barang', 'barang.id', '=','hadiah.barang_id')
                    ->join('mitra', 'mitra.id', '=','history_klaim_hadiah.mitra_id')
                    ->select('hadiah.poin as poin', 'barang.nama as nama_barang', 'history_klaim_hadiah.*')
                    ->where('mitra.user_id', Auth::id());
        } else if (Auth::user()->hasRole('admin')) {
            return $model->newQuery()
                    ->join('hadiah', 'hadiah.id', '=','history_klaim_hadiah.hadiah_id')
                    ->join('barang', 'barang.id', '=','hadiah.barang_id')
                    ->join('mitra', 'mitra.id', '=','history_klaim_hadiah.mitra_id')
                    ->join('pelanggan', 'mitra.pelanggan_id', '=', 'pelanggan.id')
                    ->select('hadiah.poin as poin', 'barang.nama as nama_barang', 'history_klaim_hadiah.*', 'pelanggan.nama as nama_pelanggan');
        }
    }

    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            // ->addColumn(['width' => '120px', 'printable' => false])
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

    protected function getColumns()
    {
        if (Auth::user()->hasRole('mitra')) {
            return [
                [
                    'data' => 'nama_barang',
                    'title' => 'Hadiah',
                    'name' => 'barang.nama'
                ],
                [
                    'title' => 'Poin',
                    'data' => 'poin',
                    'name' => 'hadiah.poin'
                ],
                'keterangan',
                [
                    'title' => 'Status',
                    'data' => 'status',
                    'name' => 'status'
                ]
            ];
        } else if (Auth::user()->hasRole('admin')) {
            return [
                [
                    'data' => 'nama_pelanggan',
                    'title' => 'Nama Mitra',
                    'name' => 'pelanggan.nama'
                ],
                [
                    'data' => 'nama_barang',
                    'title' => 'Hadiah',
                    'name' => 'barang.nama'
                ],
                [
                    'title' => 'Poin',
                    'data' => 'poin',
                    'name' => 'hadiah.poin'
                ],
                'keterangan',
                [
                    'title' => 'Status',
                    'data' => 'status',
                    'name' => 'status'
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
        return 'history_klaim_hadiah_datatable_' . time();
    }
}
