<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\VendorEmployee;
use Faker\Generator as Faker;

$factory->define(VendorEmployee::class, function (Faker $faker) {

    return [
        'vendor_id' => $faker->randomDigitNotNull,
        'name' => $faker->word,
        'birthdate' => $faker->word,
        'position' => $faker->word,
        'phone' => $faker->word,
        'email' => $faker->word,
        'address' => $faker->word,
        'picture' => $faker->word,
        'description' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
