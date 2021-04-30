<?php

namespace App\DataTables;

use App\Models\PlaceToLive;
use App\Models\Transaction;
use App\Models\VendorService;
use Carbon\Carbon;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class TransactionDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'transactions.datatables_actions')
            ->editColumn('created_at', function ($query) {
                return Carbon::parse($query->created_at)->format('d/m/Y H:i');
            })
            ->editColumn('transaction_name', function ($query) {
                return null;
            })
            ->editColumn('user.username', function ($query) {
                return '<a href="' . route('users.show', $query->user->id) . '">' . $query->user->username . '</a>';
            })
            ->rawColumns(['action', 'created_at', 'transaction_name', 'user.username']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\PointTransaction $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Transaction $model)
    {
        return $model->newQuery()->with(['user']);
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
            Column::make('created_at')->title('Date')->width('18%'),
            Column::make('code')->title('Code')->width('15%'),
            Column::make('transaction_name')->title('Transaction Name')->width('27%'),
            Column::make('grand_total')->title('Grand Total')->width('20%'),
            Column::make('user.username')->title('Username')->width('10%'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'transactions' . time();
    }
}
