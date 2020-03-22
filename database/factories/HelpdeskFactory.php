<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Helpdesk;
use Faker\Generator as Faker;

$factory->define(Helpdesk::class, function (Faker $faker) {
    return [
        'type' => $faker->randomElement(['contact', 'docs']),
        'name' => $faker->randomElement([
            'Contact Person',
            'FAQ',
            'Knowledge Base'
        ]),
        'description' => $faker->text,
        'target' => $faker->domainName,
        'workdays' => $faker->randomElement([
            [1, 2, 3, 4, 5],
            [0]
        ]),
        'from' => '08:00',
        'to' => '17:00'
    ];
});
