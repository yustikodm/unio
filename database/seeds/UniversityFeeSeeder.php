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
        factory(UniversityFee::class, 100)->create();
    }
}
