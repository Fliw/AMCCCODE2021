<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Ticket;
use Faker\Generator as Faker;

$factory->define(Ticket::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text,
        'price' => $faker->randomNumber(5),
        'stock' => $faker->numberBetween(0, 10),
        'buyable' => true
    ];
});
