<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Category;


$factory->define(Category::class, function (Faker $faker) {
    $title = $faker->sentence($nbWords = rand(1,3), $variableNbWords = true);
    return [
        'title' => $title,
        'slug' => Str::slug($title)
    ];
});
