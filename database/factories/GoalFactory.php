<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Course;
use App\Goal;
use Faker\Generator as Faker;

$factory->define(Goal::class, function (Faker $faker) {
    return [
        'course_id' => Category::all()->random()->id,
        'goal' => $faker->sentence
    ];
});
