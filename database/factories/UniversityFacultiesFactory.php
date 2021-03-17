<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\UniversityFaculties;
use Faker\Generator as Faker;

$factory->define(UniversityFaculties::class, function (Faker $faker) {

    return [
        'university_id' => $faker->randomDigitNotNull,
        'name' => $faker->word,
        'description' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
