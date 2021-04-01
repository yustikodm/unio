<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\VendorEmployee;
use Faker\Generator as Faker;

$factory->define(VendorEmployee::class, function (Faker $faker) {

    return [
        'vendor_id' => $faker->numberBetween(1, 50),
        'name' => $faker->word,
        'birthdate' => $faker->date('Y-m-d'),
        'position' => $faker->word(5),
        'phone' => $faker->randomNumber,
        'email' => $faker->email,
        'address' => $faker->address,
        'description' => $faker->paragraph,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
    ];
});
