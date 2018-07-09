<?php

use App\Client;
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

$factory->define(
    Client::class,
    function (Faker $faker) {
        return [
            'name'    => $faker->name,
            //		'address' => $faker->randomElement(['Bagbazar', 'Sukute', 'Rsr', 'Lekhnath', 'Teku', 'Balaju']),
            'address' => $faker->state,
            //'contact' => $faker->phoneNumber,
            'contact' => $faker->unique()->numberBetween(9841000000, 9841999999),
        ];
    }
);

