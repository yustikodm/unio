<?php

use App\Models\Religion;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ReligionsSeeder extends Seeder
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
        'name' => 'Islam',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ],
      [
        'name' => 'Christianity',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ],
      [
        'name' => 'Hinduism',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ],
      [
        'name' => 'Buddhism',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ],
      [
        'name' => 'Atheism',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ],
      [
        'name' => 'Others',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]
    ];

    Religion::insert($data);
  }
}
