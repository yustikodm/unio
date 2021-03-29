<?php

use App\Models\BoardingHouse;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CreateBoardingHouseSeeder extends Seeder
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
                'state_id' => 1,
                'district_id' => 1,
                'currency_id' => 1,
                'name' => 'Kos-Kosan Tentram Sentosa',
                'description' => 'kos2 an yg nyaman',
                'price' => 700000,
                'address' => 'Kebonsari',
                'phone' => '08781222331',
                'picture' => '/tmp/phpd5vxgF',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        BoardingHouse::create($data);
    }
}
