<?php

use App\Models\UniversityFaculties;
use Illuminate\Database\Seeder;

class UniversityFacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(UniversityFaculties::class, 100)->create();
    }
}
