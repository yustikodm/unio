<?php

use App\Models\UniversityScholarship;
use Illuminate\Database\Seeder;

class UniversityScholarshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(UniversityScholarship::class, 50)->create();
    }
}
