<?php

namespace App\DataTables;

use App\Models\Family;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class FamilyDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'families.datatables_actions')
        ->editColumn('child.username', function ($query) {
          return '<a href="' . route('users.show', $query->child->id) . '">' . $query->child->username . '</a>';
        })
        ->editColumn('parent.username', function ($query) {
          return '<a href="' . route('users.show', $query->parent->id) . '">' . $query->parent->username . '</a>';
        })
        ->editColumn('family_as', function ($query) {
            return ucwords($query->family_as);
        })
        ->rawColumns(['action', 'child.username', 'parent.username', 'family_as']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Family $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Family $model)
    {
        return $model->newQuery()->with('parent', 'child');
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
          Column::make('parent.username')->title('Parent User'),
          Column::make('child.username')->title('Child User'),
          Column::make('family_as')->title('As'),
        //   Column::make('family_verified_at')->title('Verify At'),            
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'families_datatable_' . time();
    }
}
