<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $admin = User::create([
      'username' => 'admin',
      'email' => 'admin@demo.com',
      'password' => Hash::make('password'),
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
    ]);

    $admin->assignRole('admin');

    $moderator = User::create([
      'username' => 'moderator',
      'email' => 'moderator@demo.com',
      'password' => Hash::make('password'),
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
    ]);

    $moderator->assignRole('moderator');

    $user = User::create([
      'username' => 'user',
      'email' => 'user@demo.com',
      'password' => Hash::make('password'),
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
    ]);

    $user->assignRole('user');
  }
}
