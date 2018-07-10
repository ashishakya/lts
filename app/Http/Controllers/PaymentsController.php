<?php

namespace App\Http\Controllers;

use App\Loan;
use App\Payment;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $loan, $payment;

    public function __construct(Loan $loan, Payment $payment)
    {
        $this->loan    = $loan;
        $this->payment = $payment;
        $this->middleware('auth');
    }

    public function index()
    {
        $payments = $this->payment->with(['client', 'type'])->orderBy('id')->get();

        return view('payment.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $loans_id = $this->loan->where('loan_clear', 0)->orderBy('id', 'asc')->get()->pluck('id', 'id');

        return view('payment.create', compact('loans_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */

    // loan_id and amount from payment.index
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'amount' => 'required|numeric|min:1',
            ]
        );

        $attribute = $request->all();
        $loan_id   = $attribute['loan_id'];
        $loan      = $this->loan->find($loan_id);

        $relation = $loan->payments()->exists();

        if ( $relation ) {
            $payment = $loan->payments()->orderBy('id', 'desc')->first();
            $due     = $payment->pap;
        } else {
            $due = $loan->amount;
        }

        if ( $attribute['amount'] > $due ) {
//            return redirect()->back()->with('status', 'Payment amount greater than due amount');
            flash()->warning('Error Alert: Payment amount greater than due amount');
            return redirect()->back();
        } else {
            return $this->paymentEntry($attribute);
        }
    }


//    accepts whole attribute cuz we need to add more parameters to it
    private function paymentEntry($attribute)
    {
        $loan = $this->loan->find($attribute['loan_id']);

        $lastPayment = $loan->payments()->latest()->first();

        $relation = $loan->payments()->exists();

        if ( $relation ) {
            $last_date = $lastPayment->created_at;
            $pbp       = $lastPayment->pap;
        } else {
            $last_date = $loan->created_at;
            $pbp       = $loan->amount;
        }

        $attribute['client_id'] = $loan->client_id;
        $attribute['type_id']   = $loan->type_id;

        $attribute['last_date'] = $last_date;

        $attribute['pbp'] = $pbp;
        $attribute['pap'] = $pbp - $attribute['amount'];

        $diff = diffInDate(Carbon::today(), $last_date);


        $interest_rate   = $loan->interest;
        $interest_amount = ($pbp * $interest_rate * $diff) / (100 * 365);

        $attribute['interest_amount'] = $interest_amount;
        //dd($attribute);
        Payment::create($attribute);

        $this->checkLoanClear($attribute['loan_id']);


        return redirect(route('loans.index'));
    }

    private function checkLoanClear($loan_id)
    {
        $loan = $this->loan->find($loan_id);
        if ( $loan->payments()->orderBy('id', 'desc')->first()->pap == 0 ) {
            $loan->update(['loan_clear' => 1]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getDetailView($id)
    {
        $loan = $this->loan->with(['payments', 'types', 'clients'])->find($id);

        return view('payment.detailView', compact('loan'));
    }


    public function getPdf($id)
    {
        $loan = $this->loan->with(['payments', 'types', 'clients'])->find($id);
        //return view('payment.pdf', compact('loan'));
        $pdf = PDF::loadView('payment.pdf', compact('loan'));

        return $pdf->download('Invoice.pdf');
    }


    public function updateIndividualInterest($id)
    {
        $payment = $this->payment->findOrFail($id);
        $payment->update(['interest_paid' => 1]);

        return redirect()->back();
    }

    public function updateAllInterest($id)
    {
        $attributes = $this->payment->where('loan_id', $id)->get();
        foreach ($attributes as $attribute) {
            $attribute->update(['interest_paid' => 1]);
        }

        return redirect()->back();
    }
}


