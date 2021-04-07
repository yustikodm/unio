<?php

use App\Models\Permission;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $defaultRoles = ['admin', 'moderator', 'user'];

    foreach ($defaultRoles as $role) {
      $roles = Role::firstOrCreate([
        'name' => trim($role),
        'guard_name' => 'web',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]);

      if ($roles->name == strtolower('admin')) {
        $roles->syncPermissions(Permission::all());
      } else {
        $permission = Permission::where('name', 'LIKE', '%.index')
          ->orWhere('name', 'LIKE', '%.create')
          ->orWhere('name', 'LIKE', '%.store')
          ->orWhere('name', 'LIKE', '%.show')
          ->get();

        $roles->syncPermissions($permission);
      }
    }
  }
}
