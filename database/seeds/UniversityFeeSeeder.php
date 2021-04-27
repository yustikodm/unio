<?php

use App\Models\UniversityFee;
use Carbon\Carbon;
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
            ['university_id' => 1, 'faculty_id' => 1, 'major_id' => 1, 'type' => null, 'admission_fee' => 12000000, 'semester_fee' => 3000000, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 1, 'major_id' => 2, 'type' => null, 'admission_fee' => 15000000, 'semester_fee' => 2500000, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 1, 'major_id' => 3, 'type' => null, 'admission_fee' => 10000000, 'semester_fee' => 1500000, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 1, 'major_id' => 4, 'type' => null, 'admission_fee' => 12000000, 'semester_fee' => 1000000, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 1, 'major_id' => 5, 'type' => null, 'admission_fee' => 17000000, 'semester_fee' => 3500000, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 1, 'major_id' => 5, 'type' => null, 'admission_fee' => 15000000, 'semester_fee' => 4500000, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 3, 'major_id' => 1, 'type' => null, 'admission_fee' => 14000000, 'semester_fee' => 5300000, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 3, 'major_id' => 2, 'type' => null, 'admission_fee' => 12000000, 'semester_fee' => 5100000, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 3, 'major_id' => 3, 'type' => null, 'admission_fee' => 16000000, 'semester_fee' => 8500000, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 3, 'major_id' => 4, 'type' => null, 'admission_fee' => 19000000, 'semester_fee' => 9200000, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 2, 'major_id' => 1, 'type' => null, 'admission_fee' => 27000000, 'semester_fee' => 5800000, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 2, 'major_id' => 2, 'type' => null, 'admission_fee' => 30000000, 'semester_fee' => 8100000, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 2, 'major_id' => 3, 'type' => null, 'admission_fee' => 25000000, 'semester_fee' => 7500000, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 4, 'major_id' => 1, 'type' => null, 'admission_fee' => 26000000, 'semester_fee' => 8900000, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 4, 'major_id' => 2, 'type' => null, 'admission_fee' => 27600000, 'semester_fee' => 7700000, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 4, 'major_id' => 3, 'type' => null, 'admission_fee' => 29000000, 'semester_fee' => 8400000, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 5, 'major_id' => 1, 'type' => null, 'admission_fee' => 21000000, 'semester_fee' => 9800000, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 5, 'major_id' => 2, 'type' => null, 'admission_fee' => 23000000, 'semester_fee' => 9700000, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 5, 'major_id' => 3, 'type' => null, 'admission_fee' => 22000000, 'semester_fee' => 9900000, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 6, 'major_id' => 1, 'type' => null, 'admission_fee' => 31000000, 'semester_fee' => 7900000, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 6, 'major_id' => 2, 'type' => null, 'admission_fee' => 28000000, 'semester_fee' => 8800000, 'description' => null],
            
            ['university_id' => 2, 'faculty_id' => 1, 'major_id' => 1, 'type' => null, 'admission_fee' => 25000000, 'semester_fee' => 6800000, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 1, 'major_id' => 2, 'type' => null, 'admission_fee' => 20000000, 'semester_fee' => 9900000, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 1, 'major_id' => 3, 'type' => null, 'admission_fee' => 19000000, 'semester_fee' => 7500000, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 2, 'major_id' => 1, 'type' => null, 'admission_fee' => 21000000, 'semester_fee' => 8700000, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 2, 'major_id' => 2, 'type' => null, 'admission_fee' => 17000000, 'semester_fee' => 8300000, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 2, 'major_id' => 3, 'type' => null, 'admission_fee' => 30000000, 'semester_fee' => 9400000, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 3, 'major_id' => 1, 'type' => null, 'admission_fee' => 21500000, 'semester_fee' => 6900000, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 3, 'major_id' => 2, 'type' => null, 'admission_fee' => 17500000, 'semester_fee' => 7200000, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 3, 'major_id' => 3, 'type' => null, 'admission_fee' => 10000000, 'semester_fee' => 8100000, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 4, 'major_id' => 1, 'type' => null, 'admission_fee' => 12000000, 'semester_fee' => 6700000, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 4, 'major_id' => 2, 'type' => null, 'admission_fee' => 8000000, 'semester_fee' => 1700000, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 4, 'major_id' => 3, 'type' => null, 'admission_fee' => 5000000, 'semester_fee' => 1600000, 'description' => null],
            
            ['university_id' => 3, 'faculty_id' => 1, 'major_id' => 1, 'type' => null, 'admission_fee' => 25000000, 'semester_fee' => 1200000, 'description' => null],
            ['university_id' => 3, 'faculty_id' => 1, 'major_id' => 2, 'type' => null, 'admission_fee' => 35000000, 'semester_fee' => 1600000, 'description' => null],
            ['university_id' => 3, 'faculty_id' => 1, 'major_id' => 3, 'type' => null, 'admission_fee' => 32000000, 'semester_fee' => 1800000, 'description' => null],
            ['university_id' => 3, 'faculty_id' => 2, 'major_id' => 1, 'type' => null, 'admission_fee' => 24000000, 'semester_fee' => 2100000, 'description' => null],
            ['university_id' => 3, 'faculty_id' => 2, 'major_id' => 2, 'type' => null, 'admission_fee' => 45000000, 'semester_fee' => 1900000, 'description' => null],
            ['university_id' => 3, 'faculty_id' => 2, 'major_id' => 3, 'type' => null, 'admission_fee' => 38000000, 'semester_fee' => 2000000, 'description' => null],
            ['university_id' => 3, 'faculty_id' => 3, 'major_id' => 1, 'type' => null, 'admission_fee' => 28000000, 'semester_fee' => 1400000, 'description' => null],
            ['university_id' => 3, 'faculty_id' => 3, 'major_id' => 2, 'type' => null, 'admission_fee' => 37000000, 'semester_fee' => 1900000, 'description' => null],
            ['university_id' => 3, 'faculty_id' => 3, 'major_id' => 3, 'type' => null, 'admission_fee' => 28000000, 'semester_fee' => 1400000, 'description' => null],
            ['university_id' => 3, 'faculty_id' => 4, 'major_id' => 1, 'type' => null, 'admission_fee' => 36000000, 'semester_fee' => 2200000, 'description' => null],
            ['university_id' => 3, 'faculty_id' => 4, 'major_id' => 2, 'type' => null, 'admission_fee' => 22000000, 'semester_fee' => 2400000, 'description' => null],
            ['university_id' => 3, 'faculty_id' => 4, 'major_id' => 3, 'type' => null, 'admission_fee' => 39000000, 'semester_fee' => 2500000, 'description' => null],
            ['university_id' => 3, 'faculty_id' => 5, 'major_id' => 1, 'type' => null, 'admission_fee' => 34000000, 'semester_fee' => 1850000, 'description' => null],
            ['university_id' => 3, 'faculty_id' => 5, 'major_id' => 2, 'type' => null, 'admission_fee' => 26500000, 'semester_fee' => 2000000, 'description' => null],
            ['university_id' => 3, 'faculty_id' => 5, 'major_id' => 3, 'type' => null, 'admission_fee' => 31000000, 'semester_fee' => 2300000, 'description' => null],
        ];

        foreach($fees as $fee){
            UniversityFee::create(array_merge($fee, [
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]));
        }
    }
}
