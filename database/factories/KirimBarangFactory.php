<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\KirimBarang;
use Faker\Generator as Faker;

$factory->define(KirimBarang::class, function (Faker $faker) {

    return [
        'purchase_order_id' => $faker->randomDigitNotNull,
        'kode' => $faker->word,
        'pegawai_id' => $faker->randomDigitNotNull,
        'supplier_id' => $faker->randomDigitNotNull,
        'tanggal' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
