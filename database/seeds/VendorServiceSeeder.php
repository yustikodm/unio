<?php

use App\Models\VendorService;
use Illuminate\Database\Seeder;

class VendorServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(VendorService::class, 30)->create();
    }
}
