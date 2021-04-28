<?php

namespace App\DataTables;

use App\Models\UniversityMajor;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class UniversityMajorDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'university_majors.datatables_actions')
            ->editColumn('university.name', function ($query) {
                return '<a href="' . route('universities.show', $query->university->id) . '">' . $query->university->name . '</a>';
            })
            ->editColumn('faculty.name', function ($query) {
              if (!empty($query->faculty->id)) {
                return '<a href="' . route('university-faculties.show', $query->faculty->id) . '">' . $query->faculty->name . '</a>';
              }
              return '<span class="text-muted"><em>Faculty not available.</em></span>';
            })
            ->rawColumns(['action', 'university.name', 'faculty.name']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\UniversityMajor $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(UniversityMajor $model)
    {
        return $model->newQuery()->with(['university', 'faculty'])->orderBy('name', 'asc');
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
            Column::make('name')->title('Major')->width('23%'),
            Column::make('accreditation')->title('Accreditation')->width('10%'),
            Column::make('faculty.name')->title('Faculty')->width('24%'),
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
        return 'university_majors_datatable_' . time();
    }
}
