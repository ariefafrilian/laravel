<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\About;
use Faker\Generator as Faker;

$factory->define(About::class, function (Faker $faker) {
    return [
    	'country' => 'Falkland Islands (Malvinas)',
    	'company' => 'Bogan-Treutel',
    	'city' => 'West Judge',
    	'address' => '8888 Cummings Vista Apt. 101, Susanbury, NY 95473',
    	'email' => 'king.alford@example.org',
    	'phone' => '+27113456789'
    ];
});
