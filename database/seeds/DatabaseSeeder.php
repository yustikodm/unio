<?php

use App\Models\District;
use App\Models\Permission;
use App\Models\PlaceToLive;
use App\Models\University;
use App\Models\UniversityFaculties;
use App\Models\UniversityFee;
use App\Models\UniversityMajor;
use App\Models\UniversityRequirement;
use App\Models\UniversityScholarship;
use App\Models\VendorCategory;
use App\Models\VendorService;
use App\Models\Wishlist;
use Illuminate\Database\Seeder;
use Spatie\Permission\Commands\CreatePermission;
use Spatie\Permission\Commands\CreateRole;

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
          ReligionsSeeder::class,
          CountriesSeeder::class,
          StatesSeeder::class,
          DistrictSeeder::class,
          UniversitiesSeeder::class,
          UniversityMajorSeeder::class,
      ]);
      
      // DATA DUMMY (FAKER)
      // $this->call([
      //     UniversityFacultySeeder::class,
      //     UniversityRequirementSeeder::class,
      //     UniversityFeeSeeder::class,
      //     UniversityScholarshipSeeder::class,
      //     UniversityFacilitiesSeeder::class,
      //     PlaceToLiveSeeder::class,
      //     ArticleSeeder::class,
      //     VendorCategoriesSeeder::class,
      //     VendorsSeeder::class,
      //     VendorServiceSeeder::class,
      //     VendorEmployeeSeeder::class,
      //     WishlistSeeder::class,
      // ]);
  }
}
