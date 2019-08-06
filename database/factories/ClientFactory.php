<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Client::class, function (Faker $faker) {
    return [
      'name' => $faker->name,
      'birthday' => $faker->dateTimeBetween($startDate = '-10 years', $endDate = '-1 years', $timezone = null),
      'parent'=> $faker->name,
      'description' => $faker->paragraph,
      'phone' => $faker->randomNumber($nbDigits = 11, $strict = false),
      'imageUrl' => 'public/avatars/noImage.png'
    ];
});
