<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Course;
use App\Level;
use App\Teacher;
use Faker\Generator as Faker;
use Faker\Provider\Image;


$factory->define(Course::class, function (Faker $faker) {
	$name = $faker->sentence;
	$status = $faker->randomElement([Course::PENDING, Course::REJECTED]);
    return [
        'teacher_id' => Teacher::all()->random()->id,
        'category_id' => Category::all()->random()->id,
        'level_id' => Level::all()->random()->id,
        'name' => $name,
        'slug' => str_slug($name, '-'),
        'description' => $faker->paragraph,
        'picture' => Image::image(storage_path() . '/app/public/courses', 600, 300, 'business', false),
        'status' => $status,
        'previous_approved' => $status !== Course::PUBLISHED ? false : true,
        'previous_rejected' => $status !== Course::REJECTED ? true : false,
    ];
});
