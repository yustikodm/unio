<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Guardian;
use Faker\Generator as Faker;

$factory->define(Guardian::class, function (Faker $faker) {

    return [
        'user_id' => $faker->randomDigitNotNull,
        'guardian_id' => $faker->randomDigitNotNull,
        'username' => $faker->word,
        'password' => $faker->word,
        'name' => $faker->word,
        'picture' => $faker->text,
        'birth_date' => $faker->word,
        'birth_place' => $faker->word,
        'email' => $faker->word,
        'nik' => $faker->word,
        'religion_id' => $faker->randomDigitNotNull,
        'address' => $faker->word,
        'phone' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
