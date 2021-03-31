<?php

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
    $data = [
      [
        'name' => 'admin',
        'guard_name' => 'web',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ],
      [
        'name' => 'guest',
        'guard_name' => 'web',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ],
    ];

    Role::insert($data);
  }
}
