<?php

use Illuminate\Database\Seeder;

use App\Loan;

class LoanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Loan::insert([

                     ]);


        factory(App\Loan::class, 5)->create()->each(function ($u) {
            $u->clients()->save(factory(App\Client::class)->make());
        });

    }
}
