<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
        'type' => $faker->randomElement([
            'ceremony',
            'competition',
            'exhibition',
            'seminar',
            'talkshow'
        ]),
        'description' => $faker->text,
        'published' => $faker->randomElement([true, false])
    ];
});
