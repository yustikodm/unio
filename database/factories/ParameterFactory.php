<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Parameter;
use Faker\Generator as Faker;

$factory->define(Parameter::class, function (Faker $faker) {

    return [
        'key' => $faker->word,
        'value' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
