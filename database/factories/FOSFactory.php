<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\FOS;
use Faker\Generator as Faker;

$factory->define(FOS::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'cip' => $faker->word,
        'hc' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
