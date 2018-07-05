<?php


use App\Loan;

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


//dd($clients->count(), 2, $loanTypes->count());
$factory->define(
    Loan::class,
    function (Faker $faker) {
        $loanTypes = \App\Type::all();
        $type =  $loanTypes->random();
        $clients = \App\Client::all();
        return [
            'amount'    => $faker->numberBetween(100000, 500000),
            'client_id' => $clients->random()->id,
            'type_id'   => $type->id,
            'interest'  => $type->rate,
        ];
    }
);


