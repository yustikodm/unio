<?php

use App\Models\UniversityFacility;
use Illuminate\Database\Seeder;

class UniversityFacilitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(UniversityFacility::class, 100)->create();
    }
}
