<?php

use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
      // DATA REAL
      $this->call([
          PermissionsSeeder::class,
          RolesSeeder::class,
          UsersSeeder::class,
          FamilySeeder::class,
          CountriesSeeder::class,
          StatesSeeder::class,
          DistrictSeeder::class,
          UniversitiesSeeder::class,
          UniversityFacultySeeder::class,
          UniversityMajorSeeder::class,
          UniversityFeeSeeder::class,
          UniversityScholarshipSeeder::class,
          UniversityFacilitiesSeeder::class,
          PlaceToLiveSeeder::class,
          VendorCategoriesSeeder::class,
          VendorsSeeder::class,
          VendorServiceSeeder::class,
          VendorEmployeeSeeder::class,
          ArticleSeeder::class
      ]);
          
      // DATA DUMMY (FAKER)
      // WishlistSeeder::class,
      // $this->call([
      //     
      //     UniversityRequirementSeeder::class,
      //     
      //     
      //     
      // ]);
  }
}
