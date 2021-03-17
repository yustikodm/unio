<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Pelanggan;
use Faker\Generator as Faker;

$factory->define(Pelanggan::class, function (Faker $faker) {

    return [
        'kode' => $faker->word,
        'nomor_ktp' => $faker->word,
        'nama' => $faker->word,
        'jenis_kelamin' => $faker->word,
        'tanggal_lahir' => $faker->word,
        'pekerjaan' => $faker->word,
        'kota' => $faker->word,
        'alamat' => $faker->word,
        'telepon' => $faker->word,
        'hp' => $faker->word,
        'tanggal_daftar' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
