<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Ticket;
use Faker\Generator as Faker;

$factory->define(Ticket::class, function (Faker $faker) {
    $eventsId = App\Models\Event::select('id')->get()->collapse();

    return [
        'name' => $faker->name,
        'description' => $faker->text,
        'events_id' => $faker->randomElement($eventsId),
        'price' => $faker->randomNumber(5),
        'stock' => 999,
        'buyable' => true
    ];
});
