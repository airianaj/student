<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [
        'grade'=> $faker->numberBetween($min = 1, $max = 4),
        'name' => $faker->realText(20),
        'addres' => $faker->realText(20),
        'img_path' => $faker->realText(20),
        'comment' => $faker->realText(20),
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => null,
    ];
});
