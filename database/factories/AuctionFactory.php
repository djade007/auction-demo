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

$factory->define(App\Auction::class, function (Faker $faker) {
    return [
        'name' => ucwords(str_replace('.', '', $faker->sentence())),
        'user_id' => 1,
        'price' => $faker->numberBetween(50, 10000),
        'description' => $faker->text
    ];
});
