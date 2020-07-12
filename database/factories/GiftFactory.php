<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Gift;
use Faker\Generator as Faker;

$factory->define(Gift::class, function (Faker $faker) {
    return [
    	'name' => $faker->word,
        'serial' => $faker->unique()->ean8,
        'description' => $faker->text(100),
        'points' => $faker->numberBetween(1, 100)
    ];
});
