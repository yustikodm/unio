<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class TestController extends Controller
{
  public function index(Request $request, $param)
  {
    # http://localhost:8000/coba/apa?input=cek

    echo $request->input . ' - ' . $param;
  }
}
