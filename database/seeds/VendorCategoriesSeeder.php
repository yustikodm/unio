<?php

use App\Models\VendorCategory;
use Illuminate\Database\Seeder;

class VendorCategoriesSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $categories = [
      [
        'name' => 'Tutoring',
        'description' => null,
      ],
      [
        'name' => 'Computer Course',
        'description' => null,
      ]
    ];

    foreach ($categories as $category) {
      VendorCategory::create(array_merge($category, [
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ]));
    };
  }
}
