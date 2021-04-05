<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class ModelHasRolesSeeder extends Seeder
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
            'role_id' => 1,
            'model_type' => 'App\User',
            'model_id' => 1
          ]
        ];

        Role::insertModelHasRoles($data);
    }
}
