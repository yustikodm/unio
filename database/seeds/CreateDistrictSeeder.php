<?php

use App\Models\District;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CreateDistrictSeeder extends Seeder
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
            ]
        ];

        District::create($data);
    }
}
