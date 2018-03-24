<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    $date = $faker->date.' '.$faker->time;
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt('secret'),
        'remember_token' => str_random(10),
        'created_at' => $date,
        'updated_at' => $date,
        'remember_token' => str_random(10)
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    $date = $faker->date.' '.$faker->time;

    return [
        'title' => $faker->sentence(6),
        'content' => $faker->paragraph(3),
        'user_id' => 0,
        'created_at' => $date,
        'updated_at' => $date

    ];
});

