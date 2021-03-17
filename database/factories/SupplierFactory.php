<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Supplier;
use Faker\Generator as Faker;

$factory->define(Supplier::class, function (Faker $faker) {

    return [
        'kode' => $faker->word,
        'nama' => $faker->word,
        'pic' => $faker->word,
        'alamat' => $faker->word,
        'kelurahan' => $faker->word,
        'kecamatan' => $faker->word,
        'kota' => $faker->word,
        'kodepos' => $faker->word,
        'telepon' => $faker->word,
        'hp' => $faker->word,
        'email' => $faker->word,
        'kategori' => $faker->word,
        'npwp' => $faker->word,
        'rekening' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
