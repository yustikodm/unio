<?php

use App\Models\Permission;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $permissions = Permission::defaultPermissions();

    foreach ($permissions as $perms) {
        Permission::firstOrCreate(['name' => $perms]);
    }
  }
}
