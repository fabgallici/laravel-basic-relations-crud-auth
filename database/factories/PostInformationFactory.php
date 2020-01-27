<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\PostInformation;

$factory->define(PostInformation::class, function (Faker $faker) {
    return [
        'description' => $faker->text
    ];
});
