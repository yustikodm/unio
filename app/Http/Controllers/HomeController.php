<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\PenjualanRepository;
use App\Repositories\MitraRepository;
use App\Repositories\PelangganRepository;
use App\Repositories\BarangRepository;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\Escpos;
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Illuminate\Support\Facades\Storage;

use App\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $role = Role::create(['name' => 'customer']);
        // $permission = Permission::create(['name' => 'edit profile']);

        // $role->givePermissionTo($permission);
        // $permission->assignRole($role);

        // dd(Auth::user()->hasRole('writer'));

        // Auth::user()->assignRole('admin');

        // dd(User::doesntHave('roles')->get());
        return view('home', $data = []);
    }
}
