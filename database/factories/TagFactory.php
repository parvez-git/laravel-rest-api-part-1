<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Laravel\Tag;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {
    $name = 'Tag '.$faker->numberBetween(1,10);
    return [
        'name' => $name,
        'slug' => str_slug($name)
    ];
});
