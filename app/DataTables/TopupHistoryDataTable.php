<?php

namespace App\DataTables;

use App\Models\PlaceToLive;
use App\Models\TopupHistory;
use App\Models\VendorService;
use Carbon\Carbon;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class TopupHistoryDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'topup_history.datatables_actions')
            ->editColumn('country.name', function ($query) {
                return '<a href="' . route('countries.show', $query->country->id) . '">' . $query->country->name . '</a>';
            })
            ->editColumn('package.name', function ($query) {
                return '<a href="' . route('topup-packages.show', $query->package->id) . '">' . $query->package->name . '</a>';
            })
            ->editColumn('user.username', function ($query) {
                return '<a href="' . route('users.show', $query->user->id) . '">' . $query->user->username . '</a>';
            })
            ->editColumn('created_at', function ($query) {
                return Carbon::parse($query->created_at)->format('d/m/Y H:i');
            })
            ->rawColumns(['action', 'country.name', 'created_at', 'user.username', 'package.name']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\TopupHistory $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(TopupHistory $model)
    {
        return $model->newQuery()->with(['user', 'country', 'package']);
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
            Column::make('created_at')->title('Date')->width('15%'),
            Column::make('amount')->title('Amount')->width('25%'),
            Column::make('package.name')->title('Package')->width('15%'),
            Column::make('country.name')->title('Country')->width('20%'),
            Column::make('user.username')->title('Username')->width('15%'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'topup_history_datatable_' . time();
    }
}
