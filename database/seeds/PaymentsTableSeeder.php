<?php

use App\Loan;
use App\Payment;
use Illuminate\Database\Seeder;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allLoan = Loan::all();

       // dd($allLoan);
        $payment = array();
        $allLoan->each(
            function ($loan) {
                $payment['amount']          = 10000;
                $payment['client_id']       = $loan->client_id;
                $payment['loan_id']         = $loan->id;
                $payment['type_id']         = $loan->client_id;
                $payment['last_date']       = $loan->created_at;
                $payment['pbp']             = $loan->amount;
                $payment['pap']             = $payment['pbp'] - $payment['amount'];
                $payment['interest_amount'] = 155.5;
                //dd($payment);
                Payment::create($payment);
            }
        );

        //$loan = $allLoan->random();
//        return [
//            'amount' => $faker->numberBetween(1000,2000),
//            'loan_id' => $loan->loan_id,
//            'client_id' => $loan->client_id,
//            'type_id' => $loan->type_id,
//            'last_date' => Carbon::now(),
//        ];
    }
}
