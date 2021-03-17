<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\BarangPromo;
use Faker\Generator as Faker;

$factory->define(BarangPromo::class, function (Faker $faker) {

    return [
        'promo_id' => $faker->randomDigitNotNull,
        'barang_id' => $faker->randomDigitNotNull,
        'jumlah' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
