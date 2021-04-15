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
    // print_r(University::limit(5000)->get());
    // print_r(DB::select('call getuniv()'));

    // $array = [
    //   ['name' => '123'],
    //   ['name' => '456'],
    //   ['name' => '123'],
    //   ['name' => '343'],
    //   ['name' => '789'],
    //   ['name' => '789'],
    // ];
    // $data = [];
    // foreach ($array as $value) {
    //   // echo array_unique($value).'<br>';
    //   $data[$value['name']] = $value;
    // }
    // $new['new_name'] = array_values($data);
    // print_r($new);

    // $array = array_unique($array);
    // print_r($array);
    // $majors = UniversityMajor::get()->toArray();
    // $master = [];
    // foreach ($majors as $major) {
    //   $master[$major['name']] = $major;
    // }
    // echo 'unique:' . count(array_values($master)).'<br>';
    // echo 'ori: ' . count($majors);

    // COUNTRY API
    // $data = file_get_contents('countries.json');
    // $data = json_decode($data, true);
    // // echo count($data);
    // echo "<table>";
    // foreach (array_unique($data) as $v) {
    //   echo "<tr>";
    //   echo "<td>".$v['name']."</td>";
    //   echo "<td>".$v['region']."</td>";
    //   // echo "<td>".array_values($v['currencies'])['code']."</td>";
    //   echo "</tr>";
    // }
    // echo "</table>";
  }
}
