<?php

use App\Models\UniversityRequirement;
use Illuminate\Database\Seeder;

class UniversityRequirementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(UniversityRequirement::class, 100)->create();
    }
}
