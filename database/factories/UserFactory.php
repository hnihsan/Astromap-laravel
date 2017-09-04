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

$factory->define(astromap\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'level' => '0',
        'remember_token' => str_random(10),
    ];
});

$factory->state(astromap\User::class, 'dev@astromap', function ($faker) {
    static $password;

    return [
        'email' => 'dev@astromap',
        'password' => $password ?: $password = bcrypt('developer'),
        'level'=>'2',
    ];
});

$factory->state(astromap\User::class, 'admin', function ($faker) {

    return [
        'level'=>'1',
    ];
});

$factory->state(astromap\User::class, 'developer', function ($faker) {

    return [
        'level'=>'2',
    ];
});
