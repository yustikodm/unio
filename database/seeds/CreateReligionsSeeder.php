<?php

use App\Models\Religion;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CreateReligionsSeeder extends Seeder
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
                'name' => 'Islam',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        Religion::insert($data);
    }
}
