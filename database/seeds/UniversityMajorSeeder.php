<?php

use App\Models\UniversityMajor;
use Illuminate\Database\Seeder;

class UniversityMajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(UniversityMajor::class, 100)->create();
    }
}
