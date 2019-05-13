<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Laravel\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    $name = 'Category '.$faker->numberBetween(1,10);
    return [
        'name' => $name,
        'slug' => str_slug($name)
    ];
});
