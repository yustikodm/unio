<?php

namespace App\DataTables;

use App\Models\UniversityFaculties;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class UniversityFacultiesDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'university_faculties.datatables_actions')
            ->editColumn('university.name', function ($query) {
                return '<a href="' . route('universities.show', $query->university->id) . '">' . $query->university->name . '</a>';
            })
            ->rawColumns(['action', 'university.name']);;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\UniversityFaculties $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(UniversityFaculties $model)
    {
        return $model->newQuery()->with(['university']);
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
            Column::make('name')->title('Faculty'),
            Column::make('description')->title('Description'),
            Column::make('university.name')->title('University'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'university_faculties_datatable_' . time();
    }
}
