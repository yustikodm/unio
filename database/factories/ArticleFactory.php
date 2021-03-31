<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Article;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Article::class, function (Faker $faker) {
  $title = $faker->sentences;
  return [
    'title' => $title,
    'slug' => Str::slug($title),
    'description' => $faker->paragraph,
    'user_id' => $faker->numberBetween(1, 3),
    'created_at' => date('Y-m-d H:i:s'),
    'updated_at' => date('Y-m-d H:i:s')
  ];
});
