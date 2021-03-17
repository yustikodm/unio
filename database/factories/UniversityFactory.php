<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\University;
use Faker\Generator as Faker;

$factory->define(University::class, function (Faker $faker) {

    return [
        'country_id' => $faker->randomDigitNotNull,
        'state_id' => $faker->randomDigitNotNull,
        'district_id' => $faker->randomDigitNotNull,
        'name' => $faker->word,
        'description' => $faker->text,
        'logo_src' => $faker->word,
        'type' => $faker->word,
        'accreditation' => $faker->word,
        'address' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
