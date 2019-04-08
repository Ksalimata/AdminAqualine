<?php

use Faker\Generator as Faker;

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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'nom' => $faker->lastName,
        'prenom' => $faker->firstName,
        'telephone' => $faker->randomNumber($nbDigits = 8, $strict = false),
        'email' => $faker->unique()->safeEmail,
        'username' => $faker->username,
        'password' => bcrypt($faker->password),
        'role_id' => $faker->numberBetween($min = 1, $max = 3)
    ];
});
