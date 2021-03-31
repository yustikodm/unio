<?php

use App\Models\Permission;
use App\Models\VendorCategory;
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
    $this->call([
      UsersSeeder::class,
      // PermissionsSeeder::class,
      // RolesSeeder::class,
      // RoleHasPermissionsSeeder::class,
      // ReligionsSeeder::class,
      // CountriesSeeder::class,
      // StatesSeeder::class,
      // DistrictSeeder::class,
      // VendorCategoriesSeeder::class,
      // VendorsSeeder::class,
      // ArticleTableSeeder::class
    ]);
  }
}
