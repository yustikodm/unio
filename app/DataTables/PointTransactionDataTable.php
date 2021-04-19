<?php

namespace App\DataTables;

use App\Models\PlaceToLive;
use App\Models\PointTransaction;
use App\Models\VendorService;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class PointTransactionDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'point_transactions.datatables_actions')
          ->editColumn('entity_type', function ($query) {
              if ($query->entity_type == 'placetolive') {
                return '<span class="label label-info"><strong>Place to Live</strong></span>';
              }

              return '<span class="label label-success"><strong>Vendor Service</strong></span>';
          })
          ->editColumn('name', function($query){
              if ($query->entity_type == 'placetolive') {
                  return '<a href="'.route('place-to-live.show', $query->entity_id).'">'.PlaceToLive::find($query->entity_id)->name.'</a>';
              }
              
              return '<a href="'.route('vendor-services.show', $query->entity_id).'">'.VendorService::find($query->entity_id)->name.'</a>';
          })
          ->rawColumns(['action', 'entity_type', 'name']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\PointTransaction $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(PointTransaction $model)
    {
        return $model->newQuery()->with(['user']);
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
            Column::make('user.username')->title('Username'),
            Column::make('entity_id')->title('Entity ID'),
            Column::make('entity_type')->title('Entity Type'),
            Column::make('name')->title('Name'),
            Column::make('amount')->title('Amount'),
            Column::make('point_conversion')->title('Point Conversion'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'point_transactions_datatable_' . time();
    }
}
