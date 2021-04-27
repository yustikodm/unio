<?php

use App\Models\Biodata;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

    Biodata::create([
      'user_id' => $admin->id,
      'fullname' => 'Administrator',
      'address' => 'Surabaya 17',
      'gender' => 'Male',
      'identity_number' => 4523495239548,
    ]);

    $admin->assignRole('admin');

    $student = User::create([
      'username' => 'student',
      'email' => 'student@demo.com',
      'password' => Hash::make('password'),
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
    ]);

    Biodata::create([
      'user_id' => $student->id,
      'fullname' => 'Student',
      'address' => 'Jakarta 66',
      'gender' => 'Male',
      'identity_number' => 936735656462,
    ]);

    $student->assignRole('student');

    $vendor = User::create([
      'username' => 'vendor',
      'email' => 'vendor@demo.com',
      'password' => Hash::make('password'),
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
    ]);

    Biodata::create([
      'user_id' => $vendor->id,
      'fullname' => 'Vendor',
      'address' => 'Semarang 20',
      'gender' => 'Male',
      'identity_number' => 5745623423,
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
