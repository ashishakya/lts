<?php

use Illuminate\Database\Seeder;

use App\Payment;


class PaymentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
            Payment::insert([
                'amount'  => 25000,
                'client_id' => 1,
                'loan_id' => 2,                
             ]);           
    }
}
