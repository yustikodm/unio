<?php

namespace App\DataTables;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class PermissionDataTable extends DataTable
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

        return $dataTable
            ->editColumn('class',function ($permission){
                return explode('.', $permission->name)[0];
            })
            ->editColumn('roles', function ($permission) {
                return json_encode(['permission' => $permission->name, 'roles' => $permission->roles->pluck('name')->toArray()]);
            })
            ->addColumn('action', 'permissions.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Permission $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Permission $model)
    {
        return $model->newQuery()->with('roles');
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
                "initComplete" => "function (settings){
                    console.log('initComplete'); 
                    renderiCheck(settings.sTableId)
                }",
                // "stateSaveParams" => "function(settings){renderiCheck(settings.sTableId);}"
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        $columns = [
            [
                'data' => 'name',
                'title' => 'Permission Name',
                'searchable' => true
            ],
            [
                'data' => 'class',
                'title' => 'Permission Class',
                'visible' => false,
                'className' => "hide",
                'searchable' => false
            ],
            [
                'data' => 'guard_name',
                'title' => 'Guard',
                'searchable' => false,
            ],
            [
                'data' => 'roles',
                'title' => 'Roles',
                'visible' => false,
                'className' => "hide",
                'searchable' => false
            ],
        ];


        $roles = Role::select('id','name')->get();
        foreach ($roles as $role){
            $newColumn['data'] = 'roles';
            $newColumn['title'] = $role->name;
            $newColumn['searchable'] = 'false';
            $newColumn['exportable'] = 'false';
            $newColumn['printable'] = 'false';
            $newColumn['render'] = 'function(){return "<div class=\'checkbox icheck\'><label><input  type=\'checkbox\' name=\'namehere\' class=\'permission\' data-role-name=\'' . $role->name . '\' data-role-id=\'' . $role->id . '\' data-permission=\'"+data+"\'></label></div>"}';
            // $newColumn['render'] = $this->syncPermission($role);
            $columns[] = $newColumn;
        }
        return $columns;
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'permissions_datatable_' . time();
    }

    private function syncPermission($role)
    {
      return "<div class=\'checkbox icheck\'>
                <label>
                  <input type=\'checkbox\' name=\'namehere\' class=\'permission\' data-role-name=\'' . $role->name . '\' data-role-id=\'' . $role->id . '\' data-permission=\'+data+\'>
                </label></div>
              ";
    }
}
