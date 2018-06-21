<?php

namespace App\Http\Controllers;

use App\Loan;
use App\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class PaymentsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	protected $loan, $payment;

	public function __construct(Loan $loan, Payment $payment) {
		$this->loan = $loan;
		$this->payment = $payment;
	}
	public function index() {
		//$payments = $this->payment->orderBy('id')->get();
		$payments = $this->payment->with(['client', 'type'])->orderBy('id')->get();

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
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		/*	// correct set of codes
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

			$attribute['client_id'] = $this->loan->find($attribute['loan_id'])->client_id;
			$attribute['type_id'] = $this->loan->find($attribute['loan_id'])->type_id;
			$attribute['last_date'] = $last_date;

			$attribute['pbp'] = $pbp;
			$attribute['pap'] = $pbp - $attribute['amount'];

			Payment::create($attribute);
			return redirect()->route('loans.index');
		*/

		$attribute = $request->all();
		$payment = $this->loan->find($attribute['loan_id'])->payments()->latest()->first();

		$relation = $this->loan->find($attribute['loan_id'])->payments()->exists();

		if ($relation) {
			$last_date = $payment->created_at;
			$pbp = $payment->pap;
		} else {
			$last_date = $this->loan->find($attribute['loan_id'])->created_at;
			$pbp = $this->loan->find($attribute['loan_id'])->amount;
		}

		$attribute['client_id'] = $this->loan->find($attribute['loan_id'])->client_id;
		$attribute['type_id'] = $this->loan->find($attribute['loan_id'])->type_id;

		$attribute['last_date'] = $last_date;

		$attribute['pbp'] = $pbp;
		$attribute['pap'] = $pbp - $attribute['amount'];

		$today = Carbon::today()->toDateString();
		$diff = Carbon::parse($today)->diffInDays(Carbon::parse($last_date->toDateString()));

		$interest_rate = $this->loan->find($attribute['loan_id'])->interest;
		$interest_amount = ($pbp * $interest_rate * $diff) / (100 * 365);

		$attribute['interest_amount'] = $interest_amount;
		Payment::create($attribute);
		return redirect()->route('loans.index');

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

	public function getPdf($id) {
		$loan = $this->loan->find($id);
		$loan_detail = $this->loan->where('id', $id)->with(['types', 'clients'])->first();
		$payments = $loan->payments()->orderBy('id', 'asc')->get();
		//return view('payment.pdf', compact('payments', 'loan', 'loan_detail'));
		$pdf = PDF::loadView('payment.pdf', compact('payments', 'loan', 'loan_detail'));
		return $pdf->download('Invoice.pdf');
	}
}
