<?php

namespace App\DataTables;

use App\Models\Biodata;
use Carbon\Carbon;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class BiodataDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'biodata.datatables_actions')
            ->editColumn('user.username', function ($query) {
                return '<a href="' . route('users.show', $query->user->id) . '">' . $query->user->username . '</a>';
            })
            ->editColumn('birth_date', function ($query) {
                if (empty($query->birth_date)) {
                    return '';
                }

                return Carbon::parse($query->birth_date)->format('d/m/Y');
            })
            ->rawColumns(['action', 'user.username', 'birth_date']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Biodata $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Biodata $model)
    {
        return $model->newQuery()->with('user');
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
            Column::make('fullname')->title('Full Name'),
            Column::make('address')->title('Address'),
            Column::make('birth_date')->title('Birth Date'),
            Column::make('user.username')->title('User ID'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'biodata_datatable_' . time();
    }
}
