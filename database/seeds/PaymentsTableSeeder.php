<?php

use App\Loan;
use App\Payment;
use Carbon\Carbon;
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

        $allLoan->each(
            function ($loan) {
                for ($i = 1; $i <= 5; $i++) {
                    $payment     = [];
                    $relation    = $loan->payments()->exists();
                    $lastPayment = $loan->payments()->latest()->first();
                    if ( $relation ) {
                        $last_date = $lastPayment->created_at;
                        $pbp       = $lastPayment->pap;
                    } else {
                        $last_date = $loan->created_at;
                        $pbp       = $loan->amount;
                    }
                    $payment['amount']          = rand(10000, 20000);
                    $payment['loan_id']         = $loan->id;
                    $payment['client_id']       = $loan->client_id;
                    $payment['type_id']         = $loan->type_id;
                    $payment['last_date']       = $last_date;
                    $payment['pbp']             = $pbp;
                    $payment['pap']             = $pbp - $payment['amount'];
                    $payment['created_at']      = Carbon::parse($last_date)->addDays(13);
                    $time                       = diffInDate($payment['last_date'], $payment['created_at']);
                    $interest_rate              = $loan->interest;
                    $payment['interest_amount'] = ($payment['pbp'] * $time * $interest_rate) / (100 * 365);
                    Payment::create($payment);
                }

                /*  $payment['amount']          = 10000;
                $payment['client_id']       = $loan->client_id;
                $payment['loan_id']         = $loan->id;
                $payment['type_id']         = $loan->type_id;
                $payment['last_date']       = $loan->created_at;
                $payment['pbp']             = $loan->amount;
                $payment['created_at']      = today()->addDays(5);
                $payment['pap']             = $payment['pbp'] - $payment['amount'];
                $time                       = diffInDate($payment['last_date'], $payment['created_at']);
                $interest_rate              = $loan->interest;
                $payment['interest_amount'] = ($payment['pbp'] * $time * $interest_rate) / (100 * 365);
                Payment::create($payment);
              */

            }


        );

    }
}
