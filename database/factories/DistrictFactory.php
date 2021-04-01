<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\District;
use Faker\Generator as Faker;

$factory->define(District::class, function (Faker $faker) {
    return [
        'state_id' => $faker->numberBetween(1,100),
        'name' => $faker->word,
        'created_at' => date('Y-m-d H:i:s'),  
        'updated_at' => date('Y-m-d H:i:s')
    ];
});
