<?php

use App\Models\Biodata;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BiodataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $biodata = [
            [
                'user_id' => 1,
                'fullname' => 'Administrator',
                'address' => 'Surabaya 17',
                'gender' => 'Male',
                'identity_number' => 4523495239548,
                'religion_id' => 1,
            ],
            [
                'user_id' => 2,
                'fullname' => 'Student',
                'address' => 'Jakarta 66',
                'gender' => 'Male',
                'identity_number' => 7852342352423,
                'religion_id' => 1,
            ],
        ];

        foreach ($biodata as $bio) {
            Biodata::create(array_merge($bio, [
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]));
        };
    }
}
