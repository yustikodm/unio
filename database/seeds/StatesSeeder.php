<?php

use App\Models\State;
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
      factory(State::class, 100)->create();
  }
}
