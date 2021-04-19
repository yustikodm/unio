<?php

namespace App\DataTables;

use App\Models\Country;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class CountryDataTable extends DataTable
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

    return $dataTable->addColumn('action', 'countries.datatables_actions');
  }

  /**
   * Get query source of dataTable.
   *
   * @param \App\Models\Country $model
   * @return \Illuminate\Database\Eloquent\Builder
   */
  public function query(Country $model)
  {
    return $model->newQuery()->orderBy('name', 'asc');
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
      Column::make('code')->title('Code')->width('5%'),
      Column::make('name')->title('Name')->width('25%'),
      Column::make('currency_code')->title('Currency')->width('15%'),
      Column::make('currency_name')->title('Currency Name')->width('25%'),
      Column::make('region')->title('Region')->width('15%'),
    ];
  }

  /**
   * Get filename for export.
   *
   * @return string
   */
  protected function filename()
  {
    return 'countries_datatable_' . time();
  }
}
