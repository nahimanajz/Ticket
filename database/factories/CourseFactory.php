<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Course;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
        "course_code" => $faker->countryCode,
        "course_name" => $faker->languageCode,
        "credit" => $faker->century
    ];
});
