<?php

namespace App\DataTables;

use App\Models\PlaceToLive;
use App\Models\PointPricings;
use App\Models\VendorService;
use Carbon\Carbon;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class PointPricingsDataTable extends DataTable
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

        return $dataTable->editColumn('entity_type', function ($query) {
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
            ->editColumn('updated_at', function ($query) {
                return Carbon::parse($query->updated_at)->format('d/m/Y H:i');
            })
            ->rawColumns(['entity_type', 'name', 'updated_at']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\PointPricings $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(PointPricings $model)
    {
        return $model->newQuery();
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
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
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
            Column::make('entity_type')->title('Entity Type')->width('20%'),
            Column::make('name')->title('Name')->width('30%'),
            Column::make('amount')->title('Amount')->width('25%'),
            Column::make('updated_at')->title('Updated at')->width('15%'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'point_pricings_datatable_' . time();
    }
}
