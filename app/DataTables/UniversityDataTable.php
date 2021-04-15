<?php

namespace App\DataTables;

use App\Models\University;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class UniversityDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'universities.datatables_actions')
            ->editColumn('country.name', function ($query) {
                return '<a href="' . route('countries.show', $query->country->id) . '">' . $query->country->name . '</a>';
            })
            ->editColumn('logo_src', function ($query) {
                if (empty($query->logo_src)) {
                  return '<img src="#" width="90">';
                }

                return '<img src="' . $query->logo_src . '" width="90">';
            })
            ->editColumn('accreditation', function ($query) {
                return strtoupper($query->accreditation);
            })
            ->rawColumns(['action', 'country.name', 'logo_src']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\University $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(University $model)
    {
        return $model->newQuery()->with(['country']);
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
            Column::make('name')->title('University')->width('35%'),
            Column::make('logo_src')->title('Logo')->width('15%'),
            Column::make('type')->title('Type')->width('10%'),
            Column::make('accreditation')->title('Accreditation')->addClass('text-center')->width('10%'),
            Column::make('country.name')->title('Country')->width('15%'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'universities_datatable_' . time();
    }
}
