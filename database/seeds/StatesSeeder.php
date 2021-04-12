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
      $states = [
          ['country_id' => 1, 'name' => 'ACEH'],
          ['country_id' => 1, 'name' => 'SUMATERA UTARA'],
          ['country_id' => 1, 'name' => 'SUMATERA BARAT'],
          ['country_id' => 1, 'name' => 'RIAU'],
          ['country_id' => 1, 'name' => 'JAMBI'],
          ['country_id' => 1, 'name' => 'SUMATERA SELATAN'],
          ['country_id' => 1, 'name' => 'BENGKULU'],
          ['country_id' => 1, 'name' => 'LAMPUNG'],
          ['country_id' => 1, 'name' => 'KEPULAUAN BANGKA BELITUNG'],
          ['country_id' => 1, 'name' => 'KEPULAUAN RIAU'],
          ['country_id' => 1, 'name' => 'DKI JAKARTA'],
          ['country_id' => 1, 'name' => 'JAWA BARAT'],
          ['country_id' => 1, 'name' => 'JAWA TENGAH'],
          ['country_id' => 1, 'name' => 'DI YOGYAKARTA'],
          ['country_id' => 1, 'name' => 'JAWA TIMUR'],
          ['country_id' => 1, 'name' => 'BANTEN'],
          ['country_id' => 1, 'name' => 'BALI'],
          ['country_id' => 1, 'name' => 'NUSA TENGGARA BARAT'],
          ['country_id' => 1, 'name' => 'NUSA TENGGARA TIMUR'],
          ['country_id' => 1, 'name' => 'KALIMANTAN BARAT'],
          ['country_id' => 1, 'name' => 'KALIMANTAN TENGAH'],
          ['country_id' => 1, 'name' => 'KALIMANTAN SELATAN'],
          ['country_id' => 1, 'name' => 'KALIMANTAN TIMUR'],
          ['country_id' => 1, 'name' => 'KALIMANTAN UTARA'],
          ['country_id' => 1, 'name' => 'SULAWESI UTARA'],
          ['country_id' => 1, 'name' => 'SULAWESI TENGAH'],
          ['country_id' => 1, 'name' => 'SULAWESI SELATAN'],
          ['country_id' => 1, 'name' => 'SULAWESI TENGGARA'],
          ['country_id' => 1, 'name' => 'GORONTALO'],
          ['country_id' => 1, 'name' => 'SULAWESI BARAT'],
          ['country_id' => 1, 'name' => 'MALUKU'],
          ['country_id' => 1, 'name' => 'MALUKU UTARA'],
          ['country_id' => 1, 'name' => 'PAPUA BARAT'],
          ['country_id' => 1, 'name' => 'PAPUA'],
      ];

      foreach ($states as $state) {
          State::create(array_merge($state, [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
          ]));
      }
  }
}
