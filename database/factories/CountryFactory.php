<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Country;
use Faker\Generator as Faker;

$factory->define(Country::class, function (Faker $faker) {
    return [
        "name" => $faker->country,
        "code" => $faker->countryCode,
        "continent" => $faker->name
    ];
});
