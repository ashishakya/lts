<?php


use App\Type;
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
    Type::class,
    function (Faker $faker) {
        return [
            'name' => $faker->unique()->randomElement(['Agricultural', 'Home', 'Personal', 'Business']),
            'rate' => $faker->numberBetween(1, 15),
        ];
    }
);
