<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\BarangPenjualan;
use Faker\Generator as Faker;

$factory->define(BarangPenjualan::class, function (Faker $faker) {

    return [
        'penjualan_id' => $faker->word,
        'barang_id' => $faker->word,
        'jumlah' => $faker->word,
        'subtotal' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
