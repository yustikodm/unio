<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Cart;
use Faker\Generator as Faker;

$factory->define(Cart::class, function (Faker $faker) {

    return [
        'user_id' => $faker->randomDigitNotNull,
        'service_id' => $faker->randomDigitNotNull,
        'name' => $faker->word,
        'qty' => $faker->randomDigitNotNull,
        'price' => $faker->word,
        'total_price' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
