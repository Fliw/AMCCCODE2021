<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Newsfeed;
use Faker\Generator as Faker;

$factory->define(Newsfeed::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(3),
        'content' => $faker->text,
        'channel' => $faker->randomElement([['all'], ['team']]),
        'published' => true
    ];
});
