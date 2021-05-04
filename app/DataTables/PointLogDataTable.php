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

        return $dataTable->editColumn('user.username', function ($query) {
                      return '<a href="'.route('users.show', $query->user->id).'">'.$query->user->username.'</a>';
                  })
                  ->editColumn('created_at', function ($query) {
                      return Carbon::parse($query->created_at)->format('d/m/Y H:i');
                  })
                  ->editColumn('transaction_type', function ($query) {
                      return '<a href="'.route('transactions.show', $query->transaction->id).'">'.strtoupper($query->type).'</a>';
                  })
                  ->rawColumns(['user.username', 'created_at', 'transaction_type']);
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
            Column::make('created_at')->title('Trans. Date')->width('10%'),
            Column::make('transaction_type')->title('Transaction')->width('25%'),
            Column::make('point_before')->title('Point Before')->width('10%'),
            Column::make('point_amount')->title('Point Amount')->width('10%'),
            Column::make('point_after')->title('Point After')->width('10%'),
            Column::make('user.username')->title('Parent User')->width('10%'),
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
