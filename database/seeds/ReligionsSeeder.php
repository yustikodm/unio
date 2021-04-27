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
      $religions = ['Islam', 'Christianity', 'Hinduism', 'Buddhism', 'Atheism', 'Others'];
      
      foreach ($religions as $religion) {
        Religion::create([
            'name' => trim($religion),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
      };
  }
}
