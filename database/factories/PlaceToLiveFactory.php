<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\PlaceToLive;
use Faker\Generator as Faker;

$factory->define(PlaceToLive::class, function (Faker $faker) {

    return [
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
