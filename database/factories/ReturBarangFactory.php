<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ReturBarang;
use Faker\Generator as Faker;

$factory->define(ReturBarang::class, function (Faker $faker) {

    return [
        'kode' => $faker->word,
        'pegawai_id' => $faker->randomDigitNotNull,
        'supplier_id' => $faker->randomDigitNotNull,
        'keterangan' => $faker->text,
        'tanggal' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
