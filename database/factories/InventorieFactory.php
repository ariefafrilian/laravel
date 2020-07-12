<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Inventorie;
use Faker\Generator as Faker;

$factory->define(Inventorie::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'price' => $faker->randomNumber,
        'serial' => $faker->unique()->ean8,
        'description' => $faker->text(100)
    ];
});
