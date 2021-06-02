<?php

namespace App\DataTables;

use App\Models\UniversityFee;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class UniversityFeeDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'university_fees.datatables_actions')
          ->editColumn('university.name', function ($query) {
              return '<a href="' . route('universities.show', $query->university->id) . '">' . $query->university->name . '</a>';
          })
          ->editColumn('major.name', function ($query) {
              return '<a href="' . route('university-majors.show', $query->major->id) . '">' . $query->major->name . '</a>';
          })
          ->editColumn('faculty.name', function ($query) {
              return '<a href="' . route('university-faculties.show', $query->faculty->id) . '">' . $query->faculty->name . '</a>';
          })
          ->editColumn('university_fees.fee', function ($query) {
              return number_format($query->fee);
          })
          ->rawColumns(['action', 'university.name', 'faculty.name', 'major.name', 'university_fees.fee']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\UniversityFee $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(UniversityFee $model)
    {
        return $model->newQuery()->with(['university', 'faculty', 'major']);
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
            Column::make('university.name')->title('University')->width('20%'),
            Column::make('faculty.name')->title('Faculty')->width('20%'),
            Column::make('major.name')->title('Major')->width('20%'),
            Column::make('fee')->title('Fee')->width('15%'),
            Column::make('period')->title('Period')->width('15%'),
            Column::make('period_unit')->title('Period Unit')->width('15%'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'university_fees_datatable_' . time();
    }
}
