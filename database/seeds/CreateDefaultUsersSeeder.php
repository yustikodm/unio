<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CreateDefaultUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $input = [
            'name'              => 'Admin',
            'email'             => 'admin@demo.com',
            'password'          => Hash::make('admin'),
            'email_verified_at' => Carbon::now(),
        ];

        /** @var User $user */
        User::create($input);
    }
}
