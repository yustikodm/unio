<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Pegawai;
use Faker\Generator as Faker;

$factory->define(Pegawai::class, function (Faker $faker) {

    return [
        'kode' => $faker->word,
        'nama' => $faker->word,
        'tanggal_lahir' => $faker->word,
        'alamat' => $faker->text,
        'telepon' => $faker->word,
        'jabatan_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
