<?php

use App\Models\State;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class StatesSeeder extends Seeder
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
        'country_id' => 1,
        'name' => 'Jawa Timur',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ],
      [
        'country_id' => 1,
        'name' => 'Jawa Tengah',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]
    ];

    State::insert($data);
  }
}
