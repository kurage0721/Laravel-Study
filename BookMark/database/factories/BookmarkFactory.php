<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Bookmark;
use Faker\Generator as Faker;

$factory->define(Bookmark::class, function (Faker $faker) {
    return [
        'title' => $faker->realText($faker->numberBetween(10,25)),
        'url' => $faker->url(),
        'description' => $faker->realText($faker->numberBetween(50,200))
    ];
});
