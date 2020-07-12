<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'nip' => $faker->unique()->randomNumber(7),
        'email' => $faker->unique()->safeEmail,
        'password' => $faker->password,
        'first_name' => $faker->firstName(),
        'last_name' => $faker->lastName,
        'gender' => $faker->randomElement(['M', 'F']),
        'city' => $faker->city,
        'birth' => $faker->date(),
        'address' => $faker->address
    ];
});
