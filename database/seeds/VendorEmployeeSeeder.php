<?php

use App\Models\VendorEmployee;
use App\Models\VendorService;
use Illuminate\Database\Seeder;

class VendorEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(VendorEmployee::class, 30)->create();
    }
}
