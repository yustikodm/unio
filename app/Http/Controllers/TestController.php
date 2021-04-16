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
    $major = UniversityMajor::countMajors(23);
    print_r($major->count());

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
