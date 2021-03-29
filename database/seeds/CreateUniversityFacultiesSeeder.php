<?php

use App\Models\UniversityFaculties;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CreateUniversityFacultiesSeeder extends Seeder
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
                'university_id' => 1147,
                'name' => 'Ilmu Komputer',
                'description' => NULL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'university_id' => 1147,
                'name' => 'Ilmu Kedokteran',
                'description' => NULL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        UniversityFaculties::insert($data);
    }
}
