<?php

use App\Models\VendorCategory;
use Carbon\Carbon;
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
              'description' => 'Tutoring Course Colleges',
          ],
          [
              'name' => 'Computer Course',
              'description' => 'Computer Course for Public and Colleges',
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
