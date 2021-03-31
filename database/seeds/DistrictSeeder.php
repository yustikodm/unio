<?php

use App\Models\District;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $data = [
      [
        'state_id' => 1,
        'name' => 'Surabaya',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ],
      [
        'state_id' => 1,
        'name' => 'Sidoarjo',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ],
      [
        'state_id' => 2,
        'name' => 'Semarang',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ],
      [
        'state_id' => 2,
        'name' => 'Solo',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]
    ];

    District::insert($data);
  }
}
