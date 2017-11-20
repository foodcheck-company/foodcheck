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
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'email' => $faker->unique()->safeEmail,
        'status' => 1,
        'role' => 1,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Restaurant::class, function (Faker\Generator $faker) {

    return [
        'name' => ucfirst($faker->lastName),
        'description' => $faker->realText(),
        'link' => $faker->url,
        'rating' => random_int(3, 10),
        'status' => 1,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Position::class, function (Faker\Generator $faker) {

    return [
        'name' => ucfirst($faker->safeColorName) . ' ' . $faker->monthName,
        'description' => $faker->realText()
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Dish::class, function (Faker\Generator $faker) {

    return [
        'name' => ucfirst($faker->safeColorName) . ' ' . $faker->firstNameFemale,
        'description' => $faker->realText(),
        'size' => array_random(['small', 'medium', 'big', 'super-big', 'XXL']),
        'weight' => random_int(1, 10) * 100,
        'price' => random_int(10, 50) * 10 + 9,
        'qualify' => random_int(4, 10),
        'position_id' => function () {
            return factory(App\Models\Position::class)->create()->id;
        }
    ];
});
