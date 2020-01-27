<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Tag;

$factory->define(Tag::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'slug' => $faker->word
    ];
});
