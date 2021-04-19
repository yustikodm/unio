<?php

namespace App\DataTables;

use App\Models\PointLog;
use App\User;
use Carbon\Carbon;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class PointLogDataTable extends DataTable
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

        return $dataTable->editColumn('parent_id', function ($query) {
                      $user = User::find($query->parent_id);
                      return '<a href="'.$user->id.'">'.$user->username.'</a>';
                  })
                  ->editColumn('created_at', function ($query) {
                      return Carbon::parse($query->created_at)->format('d/m/Y H:i');
                  })
                  ->editColumn('transaction_name', function ($query) {
                      return '<a href="#">Modul Name / '.$query->id.'</a>';
                  })
                  ->rawColumns(['parent_id', 'created_at', 'transaction_name']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\PointLog $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(PointLog $model)
    {
        return $model->newQuery();
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
            Column::make('created_at')->title('Trans. Date')->width('15%'),
            Column::make('transaction_type')->title('Trans. Type')->width('10%'),
            Column::make('transaction_name')->title('Trans. Name')->width('15%'),
            Column::make('point_before')->title('Point Before')->width('10%'),
            Column::make('point_after')->title('Point After')->width('10%'),
            Column::make('parent_id')->title('Parent User')->width('10%'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'point_logs_datatable_' . time();
    }
}
