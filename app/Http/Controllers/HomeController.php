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

    public function __construct(PenjualanRepository $penjualan, PelangganRepository $pelanggan, MitraRepository $mitra, BarangRepository $barang)
    {
        $this->middleware('auth');
        $this->penjualanRepository = $penjualan;
        $this->pelangganRepository = $pelanggan;
        $this->mitraRepository = $mitra;
        $this->barangRepository = $barang;
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

        $data['penjualan'] = $this->penjualanRepository->all();
        $data['pelanggan'] = $this->pelangganRepository->all();
        $data['mitra'] = $this->mitraRepository->all();
        $data['barang'] = $this->barangRepository->all();
        return view('home', $data);
    }

    public function cobaPrinter(Request $request){

        $nama_printer = $request->input('nama_printer');
        try {
            $c = new WindowsPrintConnector($nama_printer);
            $printer = new Printer($c);
            $printer->text("Printer ".$nama_printer." Tersedia");
            $printer->close();
            $data = [
                'success' => true,
                'msg' => "OK"
            ];
            echo json_encode($data);
        } catch(Exception $e) {
            $data = [
                'success' => false,
                'msg' => "Couldn't print to this printer: " . $e -> getMessage() . "\n"
            ];
            echo json_encode($data);
        }
    }
}
