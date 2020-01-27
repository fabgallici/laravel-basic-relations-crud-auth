<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Category;


$factory->define(Category::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'slug' => $faker->word
    ];
});
