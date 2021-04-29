<?php

use App\Models\Family;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class FamilySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $families = [
            [
                'parent_user' => 1,
                'child_user' => 1,
                'family_as' => 'parent'
            ],
            [
                'parent_user' => 1,
                'child_user' => 2,
                'family_as' => 'child'
            ],
            [
                'parent_user' => 3,
                'child_user' => 3,
                'family_as' => 'parent'
            ],
            [
                'parent_user' => 3,
                'child_user' => 4,
                'family_as' => 'child'
            ]
        ];

        foreach ($families as $family) {
            Family::create(array_merge($family, [
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]));
        }
    }
}
