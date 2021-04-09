<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class TestController extends Controller
{
  public function index()
  {
    dd(User::where('email', 'admin@demo.com2')->first());
    // return redirect()->route('home');
    // $data = Permission::where('name', 'LIKE', '%.index')
    // ->orWhere('name', 'LIKE', '%.create')
    // ->orWhere('name', 'LIKE', '%.store')
    // ->orWhere('name', 'LIKE', '%.show')
    // ->get();

    // $data1 = Permission::all();
    // echo json_encode($data1);
    // echo json_encode(Permission::where('name', 'LIKE', '%.index')
    // ->orWhere('name', 'LIKE', '%.create')
    // ->orWhere('name', 'LIKE', '%.store')
    // ->orWhere('name', 'LIKE', '%.show')
    // ->get());
    # http://localhost:8000/coba/apa?input=cek
    // $role = ModelsRole::find(2);
    // // $role->revokePermissionTo(['users.index', 'users.create', 'users.store']);
    // $role->revokePermissionTo(['point-logs.index']);
    // dd('ok');
    // $role->revokePermissionTo(['users.index', 'users.create']);
    // $user = User::find(2);
    // $user->syncRoles(['user']);
    // dd($user);
    // echo $request->input . ' - ' . $param;
  }
}
