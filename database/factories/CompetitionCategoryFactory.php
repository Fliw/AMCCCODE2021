<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CompetitionCategory;
use Faker\Generator as Faker;

$factory->define(CompetitionCategory::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->jobTitle,
        'description' => $faker->text
    ];
});
