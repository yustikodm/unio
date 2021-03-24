<?php

namespace App\Http\Controllers;

use App\Models\Guardian;
use App\Models\Student;
use App\Models\University;
use App\Models\Vendor;
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        return view('home', [
            'university' => University::query()->count(),
            'student' => Student::query()->count(),
            'parent' => Guardian::query()->count(),
            'vendor' => Vendor::query()->count()
        ]);
    }
}
