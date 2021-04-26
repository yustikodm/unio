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

    $student = User::create([
      'username' => 'student',
      'email' => 'student@demo.com',
      'password' => Hash::make('password'),
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
    ]);

    $student->assignRole('student');

    $vendor = User::create([
      'username' => 'vendor',
      'email' => 'vendor@demo.com',
      'password' => Hash::make('password'),
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
    ]);

    $vendor->assignRole('vendor');

    $college = User::create([
      'username' => 'college',
      'email' => 'college@demo.com',
      'password' => Hash::make('password'),
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
    ]);

    $college->assignRole('college');
    
    $living = User::create([
      'username' => 'living',
      'email' => 'living@demo.com',
      'password' => Hash::make('password'),
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
    ]);

    $living->assignRole('owner_living_place');
  }
}
