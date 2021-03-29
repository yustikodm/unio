<?php

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
        $this->call(CreateDefaultUsersSeeder::class);
        $this->call(CreateReligionsSeeder::class);
        $this->call(CreateCountrySeeder::class);
        $this->call(CreateCurrenciesSeeder::class);
        $this->call(CreateStatesSeeder::class);
        $this->call(CreateDistrictSeeder::class);
        $this->call(CreateRolesSeeder::class);
        $this->call(CreatePermissionsSeeder::class);
        $this->call(CreateQuestionnairesSeeder::class);
        $this->call(CreateStudentsSeeder::class);
        $this->call(CreateBoardingHouseSeeder::class);
    }
}
