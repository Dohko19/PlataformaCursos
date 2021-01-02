<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['PHP', 'JAVA', 'DISEÑO WEB', 'SERVIDORES', 'MYSQL', 'NODEJS', 'AMAZON SERVICES']),
        'description' => $faker->sentence,
    ];
});
