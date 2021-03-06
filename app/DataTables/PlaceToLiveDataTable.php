<?php

namespace App\DataTables;

use App\Models\PlaceToLive;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class PlaceToLiveDataTable extends DataTable
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

    return $dataTable->addColumn('action', 'place_to_lives.datatables_actions')
    ->editColumn('country.name', function ($query) {
      return '<a href="' . route('countries.show', $query->country->id) . '">' . $query->country->name . '</a>';
    })
    ->rawColumns(['action', 'country.name']);
  }

  /**
   * Get query source of dataTable.
   *
   * @param \App\Models\PlaceToLive $model
   * @return \Illuminate\Database\Eloquent\Builder
   */
  public function query(PlaceToLive $model)
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
      Column::make('name')->title('Name')->width('20%'),
      Column::make('description')->title('Description')->width('40%'),
      Column::make('price')->title('Price')->width('15%'),
      Column::make('country.name')->title('Country'),
    ];
  }

  /**
   * Get filename for export.
   *
   * @return string
   */
  protected function filename()
  {
    return 'place_to_lives_datatable_' . time();
  }
}
