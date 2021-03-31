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
    $data = [
      [
        'username' => 'admin',
        'email' => 'admin@demo.com',
        'password' => Hash::make('password'),
        'api_token' => Str::random(100),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ],
      [
        'username' => 'guest',
        'email' => 'guest@demo.com',
        'password' => Hash::make('password'),
        'api_token' => Str::random(100),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ],
      [
        'username' => 'john',
        'email' => 'john@demo.com',
        'password' => Hash::make('password'),
        'api_token' => Str::random(100),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ],
    ];

    User::insert($data);
  }
}
