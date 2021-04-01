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
    // $data = [
    //   [
    //     'name' => 'Health',
    //     'description' => 'Health Service',
    //     'created_at' => Carbon::now(),
    //     'updated_at' => Carbon::now(),
    //   ],
    //   [
    //     'name' => 'Consultation',
    //     'description' => 'Constultation Service',
    //     'created_at' => Carbon::now(),
    //     'updated_at' => Carbon::now(),
    //   ],
    //   [
    //     'name' => 'Tutoring',
    //     'description' => 'Tutoring Service',
    //     'created_at' => Carbon::now(),
    //     'updated_at' => Carbon::now(),
    //   ],
    //   [
    //     'name' => 'TOEFL',
    //     'description' => 'Toefl Service',
    //     'created_at' => Carbon::now(),
    //     'updated_at' => Carbon::now(),
    //   ],
    // ];

    // VendorCategory::insert($data);

    factory(VendorCategory::class, 30)->create();
  }
}
