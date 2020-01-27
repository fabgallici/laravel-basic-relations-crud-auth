<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Post;


$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence($nbWords = rand(1,3), $variableNbWords = true),
        'author' => $faker->word
    ];
});
