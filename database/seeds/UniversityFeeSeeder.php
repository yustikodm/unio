<?php

use App\Models\UniversityFee;
use Illuminate\Database\Seeder;

class UniversityFeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fees = [
            [
                'university_id' => 1,
                'faculty_id' => 1,
                'major_id' => 1,
                'type' => 1,
                'admission_fee' => 12000000,
                'semester_fee' => 3000000,
                'description' => null,
            ]
        ];

        foreach($fees as $fee){
            UniversityFee::create(array_merge($fee, [
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]));
        }
    }
}
