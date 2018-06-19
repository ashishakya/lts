<?php

namespace App\Http\Controllers;

use App\Loan;
use App\Payment;
use Illuminate\Http\Request;

class PaymentsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	// protected $loan;

	// public function __construct(Loan $loan) {
	// 	$this->loan = $loan;
	// }
	protected $loan, $payment;

	public function __construct(Loan $loan, Payment $payment) {
		$this->loan = $loan;
		$this->payment = $payment;
	}
	public function index() {

		//
		$payments = $this->payment->all();
		return view('payment.index', compact('payments'));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
		$loans_id = $this->loan->all()->pluck('id', 'id'); //first pa
		return view('payment.create', compact('loans_id'));

		//$clients = $this->client->all()->pluck('name', 'id');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		// loan bata loan_id and amount aauncha
		$attribute = $request->all();
		//finding last payment for last_date
		$payment = $this->loan->find($attribute['loan_id'])->payments()->latest()->first();

		//checking relation for deciding value of $late_date
		$relation = $this->loan->find($attribute['loan_id'])->payments()->exists();

		if ($relation) {
			//return 'relation exists';
			$last_date = $payment->created_at;
			$pbp = $payment->pap;
		} else {
			//return 'relation does not exists';
			$last_date = $this->loan->find($attribute['loan_id'])->created_at;
			$pbp = $this->loan->find($attribute['loan_id'])->amount;
		}

		//return $last_date;

		$attribute['client_id'] = $this->loan->find($attribute['loan_id'])->client_id;
		$attribute['type_id'] = $this->loan->find($attribute['loan_id'])->type_id;
		$attribute['last_date'] = $last_date;
		//$attribute['last_date'] = Carbon::parse($last_date);

		$attribute['pbp'] = $pbp;
		$attribute['pap'] = $pbp - $attribute['amount'];

		Payment::create($attribute);
		return redirect()->route('loans.index');

		/* amount diff in route:
			$loan = Loan::find($id);
			$payment = $loan->payments()->latest()->first();
			$relation = $loan->payments()->exists();
			if ($relation) {
				echo 'relation exists' . '<br>';
				echo 'last payment= ' . $pbp = $payment->amount . '<br>';
			} else {
				echo 'realtion does not exists';
				echo 'last payment= ' . $pbp = $loan->amount;
			}

		 */

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}
}
