<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\UniversityRequirement;
use Faker\Generator as Faker;

$factory->define(UniversityRequirement::class, function (Faker $faker) {

    return [
        'university_id' => $faker->randomDigitNotNull,
        'major_id' => $faker->randomDigitNotNull,
        'name' => $faker->word,
        'value' => $faker->randomDigitNotNull,
        'description' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
