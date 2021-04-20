<?php

namespace App\Http\Controllers;

use App\DataTables\PermissionDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Repositories\PermissionRepository;
use Laracasts\Flash\Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;

class PermissionController extends AppBaseController
{
    /** @var  PermissionRepository */
    private $permissionRepository;

    public function __construct(PermissionRepository $permissionRepo)
    {
        $this->permissionRepository = $permissionRepo;
    }

    /**
     * Display a listing of the Permission.
     *
     * @param PermissionDataTable $permissionDataTable
     * @return Response
     */
    public function index(PermissionDataTable $permissionDataTable)
    {
        return $permissionDataTable->render('permissions.index');
    }

    /**
     * Show the form for creating a new Permission.
     *
     * @return Response
     */
    public function create()
    {
        return view('permissions.create');
    }

    /**
     * Store a newly created Permission in storage.
     *
     * @param CreatePermissionRequest $request
     *
     * @return Response
     */
    public function store(CreatePermissionRequest $request)
    {
        $input = $request->only([
            'name',
            'guard_name',
            'resource'
        ]);

        if ($input['resource'] == 1) {
            $permission = $this->permissionRepository->create([
                'name' => $input['name'] . '.index',
                'guard_name' => $input['guard_name']
            ]);

            $permission = $this->permissionRepository->create([
                'name' => $input['name'] . '.show',
                'guard_name' => $input['guard_name']
            ]);

            $permission = $this->permissionRepository->create([
                'name' => $input['name'] . '.create',
                'guard_name' => $input['guard_name']
            ]);

            $permission = $this->permissionRepository->create([
                'name' => $input['name'] . '.store',
                'guard_name' => $input['guard_name']
            ]);

            $permission = $this->permissionRepository->create([
                'name' => $input['name'] . '.edit',
                'guard_name' => $input['guard_name']
            ]);

            $permission = $this->permissionRepository->create([
                'name' => $input['name'] . '.update',
                'guard_name' => $input['guard_name']
            ]);

            $permission = $this->permissionRepository->create([
                'name' => $input['name'] . '.destroy',
                'guard_name' => $input['guard_name']
            ]);
        } else {
            $permission = $this->permissionRepository->create($input);
        }

        Flash::success('Permission saved successfully.');

        return redirect(route('permissions.index'));
    }

    /**
     * Display the specified Permission.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $permission = $this->permissionRepository->find($id);

        if (empty($permission)) {
            Flash::error('Permission not found');

            return redirect(route('permissions.index'));
        }

        return view('permissions.show')->with('permission', $permission);
    }

    /**
     * Show the form for editing the specified Permission.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $permission = $this->permissionRepository->find($id);

        if (empty($permission)) {
            Flash::error('Permission not found');

            return redirect(route('permissions.index'));
        }

        return view('permissions.edit')->with('permission', $permission);
    }

    /**
     * Update the specified Permission in storage.
     *
     * @param  int              $id
     * @param UpdatePermissionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePermissionRequest $request)
    {
        $permission = $this->permissionRepository->find($id);

        if (empty($permission)) {
            Flash::error('Permission not found');

            return redirect(route('permissions.index'));
        }

        $input = $request->only([
            'name',
            'guard_name',
            'resource'
        ]);

        $permission = $this->permissionRepository->update($input, $id);

        Flash::success('Permission updated successfully.');

        return redirect(route('permissions.index'));
    }

    /**
     * Remove the specified Permission from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $permission = $this->permissionRepository->find($id);

        if (empty($permission)) {
            Flash::error('Permission not found');

            return redirect(route('permissions.index'));
        }

        $this->permissionRepository->delete($id);

        Flash::success('Permission deleted successfully.');

        return redirect(route('permissions.index'));
    }

    public function givePermissionToRole(Request $request){
        $input = $request->only(['roleId', 'permission']);
        $this->permissionRepository->givePermissionToRole($input);
    }

    public function revokePermissionToRole(Request $request){
        $input = $request->only(['roleId', 'permission']);
        $this->permissionRepository->revokePermissionToRole($input);
    }

    public function roleHasPermission(Request $request){
        $input = $request->only(['roleId', 'permission']);
        //dd($input);
        $result = $this->permissionRepository->roleHasPermission($input);
        return json_encode($result);
    }
}

