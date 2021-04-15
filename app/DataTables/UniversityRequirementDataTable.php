<?php

namespace App\DataTables;

use App\Models\UniversityRequirement;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class UniversityRequirementDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'university_requirements.datatables_actions')
        ->editColumn('university.name', function ($query) {
            return '<a href="' . route('universities.show', $query->university->id) . '">' . $query->university->name . '</a>';
        })
        ->editColumn('major.name', function ($query) {
          return '<a href="' . route('university-majors.show', $query->major->id) . '">' . $query->major->name . '</a>';
      })
        ->rawColumns(['action', 'university.name', 'major.name']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\UniversityRequirement $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(UniversityRequirement $model)
    {
        return $model->newQuery()->with(['university', 'major']);
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
          Column::make('name')->title('Name')->width('25%'),
          Column::make('value')->title('Value')->width('10%'),
          Column::make('major.name')->title('Major')->width('25%'),
          Column::make('university.name')->title('University')->width('30%'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'university_requirements_datatable_' . time();
    }
}
