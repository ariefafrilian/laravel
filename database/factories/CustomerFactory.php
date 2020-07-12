<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
    	'code' => $faker->unique()->randomNumber(7),
        'first_name' => $faker->firstName(),
        'last_name' => $faker->lastName,
        'gender' => $faker->randomElement(['M', 'F']),
        'city' => $faker->city,
        'birth' => $faker->date(),
        'address' => $faker->address,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->unique()->phoneNumber,
        'points' => $faker->numberBetween(1, 100),
    ];
});
