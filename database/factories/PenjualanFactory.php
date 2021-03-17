<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Penjualan;
use Faker\Generator as Faker;

$factory->define(Penjualan::class, function (Faker $faker) {

    return [
        'kode' => $faker->word,
        'pelanggan_id' => $faker->randomDigitNotNull,
        'ppn' => $faker->word,
        'diskon' => $faker->randomDigitNotNull,
        'total' => $faker->randomDigitNotNull,
        'bayar' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
