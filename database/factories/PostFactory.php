<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Laravel\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $sentence = $faker->sentence();
    return [
        'title' => $sentence,
        'slug' => str_slug($sentence),
        'description' => $faker->paragraph,
        'user_id' => $faker->numberBetween(1,10),
        'category_id' => $faker->numberBetween(1,10)
    ];
});
