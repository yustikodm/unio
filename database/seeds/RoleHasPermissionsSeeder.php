<?php

use App\Models\Permission;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RoleHasPermissionsSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $data = [];
    $permissions = Permission::get();
    $role = Role::get();

    foreach ($role as $r) {
      foreach ($permissions as $permission) {
        $data[] = [
          'permission_id' => $permission->id,
          'role_id' => $r->id,
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
        ];
      }
    }

    Role::insertRoleHasPermission($data);
  }
}
