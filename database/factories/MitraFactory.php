<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Mitra;
use Faker\Generator as Faker;

$factory->define(Mitra::class, function (Faker $faker) {

    return [
        'kode' => $faker->word,
        'pelanggan_id' => $faker->randomDigitNotNull,
        'jenis' => $faker->word,
        'tanggal_mulai' => $faker->word,
        'tanggal_akhir' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
