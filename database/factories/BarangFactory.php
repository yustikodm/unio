<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Barang;
use Faker\Generator as Faker;

$factory->define(Barang::class, function (Faker $faker) {

    return [
        'kode' => $faker->word,
        'nama' => $faker->word,
        'satuan' => $faker->word,
        'kategori' => $faker->word,
        'subkategori' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
