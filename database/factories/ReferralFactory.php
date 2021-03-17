<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Referral;
use Faker\Generator as Faker;

$factory->define(Referral::class, function (Faker $faker) {

    return [
        'user_id' => $faker->randomDigitNotNull,
        'parent_id' => $faker->randomDigitNotNull,
        'child_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
