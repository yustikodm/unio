<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\PenyesuaianStok;
use Faker\Generator as Faker;

$factory->define(PenyesuaianStok::class, function (Faker $faker) {

    return [
        'barang_id' => $faker->randomDigitNotNull,
        'stok_database' => $faker->randomDigitNotNull,
        'stok_lapangan' => $faker->randomDigitNotNull,
        'tipe' => $faker->word,
        'jumlah' => $faker->randomDigitNotNull,
        'tanggal' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
