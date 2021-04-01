<?php

use App\Models\PlaceToLive;
use Illuminate\Database\Seeder;

class PlaceToLiveSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    factory(PlaceToLive::class, 30)->create();
  }
}
