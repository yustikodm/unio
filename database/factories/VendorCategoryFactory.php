<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\VendorCategory;
use Faker\Generator as Faker;

$factory->define(VendorCategory::class, function (Faker $faker) {

  return [
    'name' => $faker->word(5),
    'description' => $faker->paragraph,
    'created_at' => $faker->date('Y-m-d H:i:s'),
    'updated_at' => $faker->date('Y-m-d H:i:s')
  ];
});
