<?php

namespace App\Http\Controllers;

use App\Models\University;
use App\Models\Vendor;
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
      'vendor' => Vendor::query()->count(),
      'user' => User::query()->count(),
      // 'parent'
    ]);
  }
}
