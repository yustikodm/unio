<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Article;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Article::class, function (Faker $faker) {
  $title = $faker->sentence(6);
  return [
    'title' => $title,
    'slug' => Str::slug($title),
    'description' => $faker->paragraph,
    'user_id' => $faker->numberBetween(1, 2),
    'created_at' => date('Y-m-d H:i:s'),
    'updated_at' => date('Y-m-d H:i:s')
  ];
});
