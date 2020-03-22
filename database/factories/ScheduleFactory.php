<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Schedule;
use Faker\Generator as Faker;

$factory->define(Schedule::class, function (Faker $faker) {
    return [
        'event_id' => factory(App\Models\Event::class)->create()->id,
        'venue' => $faker->city,
        'capacity' => $faker->numberBetween(100, 300),
        'from' => $faker->dateTimeBetween('-2 months', '+2 months'),
        'to' => $faker->dateTimeBetween('-1 month', '+1 month')
    ];
});
