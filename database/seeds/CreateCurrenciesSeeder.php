<?php

use App\Models\Currency;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CreateCurrenciesSeeder extends Seeder
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
                'code' => 'IDR',
                'name' => 'Indonesia Rupiah',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        Currency::insert($data);
    }
}
