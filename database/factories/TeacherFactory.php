<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Teacher;
use Faker\Generator as Faker;

$factory->define(Teacher::class, function (Faker $faker) {
    return [
        'user_id' => null,
      	'title' => $faker->jobTitle,
      	'biography' => $faker->paragraph,
      	'website_url' => $faker->url,
    ];
});
