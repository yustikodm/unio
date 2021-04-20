<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\University;
use App\Models\UniversityMajor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
  public function index()
  {
    // $array = [
    //   ['name' => '123', 'desc' => 'asdf'],
    //   ['name' => '456', 'desc' => 'shji'],
    //   ['name' => '123', 'desc' => 'a3pdj'],
    //   ['name' => '343', 'desc' => 'acmso'],
    //   ['name' => '789', 'desc' => 'tskwo'],
    //   ['name' => '789', 'desc' => 'pqskjk'],
    //   ['name' => '456', 'desc' => 'ssdkls'],
    // ];

    // $data = [];
    // foreach ($array as $value) {
    // // echo array_unique($value).'<br>';
    //   $data[$value['name']] = $value;
    // }
    // $new = array_values($data);
    // print_r($new);

    // COUNTRY API
    $data = file_get_contents('countries.json');
    $data = json_decode($data, true);
    // print_r($data); die;
    
    // $region = [];
    // foreach ($data as $value) {
      // echo $value['callingCodes'][0].' - ';
      // echo $value['region'].' - ';
      // echo $value['name'].'<br>';
      // echo explode('/', $value['flag'])[4].'<br>';
      // $region[$value['flag']] = $value;
    // }
    // print_r(array_values($region));
    die;
    // foreach ($data as $v) {
    //   DB::table('countries-seeds')->insert([
    //       'code' => $v['alpha3Code'],
    //       'name' => $v['name'],
    //       'region' => $v['region'],
    //       'currency_code' => $v['currencies'][0]['code'],
    //       'currency_name' => $v['currencies'][0]['name'],
    //       'calling_code' => $v['callingCodes'][0]
    //   ]);
    // }
    
  }
}
