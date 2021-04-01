<?php

use App\Models\University;
use Illuminate\Database\Seeder;

class UniversitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(University::class, 100)->create();
    }
}
