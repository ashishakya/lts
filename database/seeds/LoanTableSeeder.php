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
        factory(Loan::class,20)->create();
    }
}
