<?php

namespace App\DataTables;

use App\Models\QuestionnaireAnswer;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class QuestionnaireAnswerDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'questionnaire_answers.datatables_actions')
            ->editColumn('questionnaire.question', function ($query) {
                  return '<a href="' . route('questionnaires.show', $query->questionnaire->id) . '">' . $query->questionnaire->question . '</a>';
            })
            ->editColumn('user.username', function ($query) {
              return '<a href="' . route('users.show', $query->user->id) . '">' . $query->user->username . '</a>';
            })
            ->rawColumns(['action', 'questionnaire.question', 'user.username']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\QuestionnaireAnswer $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(QuestionnaireAnswer $model)
    {
        return $model->newQuery()->with(['questionnaire', 'user']);
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
            Column::make('questionnaire.question')->title('Question')->width('45%'),
            Column::make('answer')->title('Answer')->width('30%'),
            Column::make('user.username')->title('User')->width('15%'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'questionnaire_answers_datatable_' . time();
    }
}
