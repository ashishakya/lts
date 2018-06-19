<?php

namespace App\Http\Controllers;

use App\Client;
use App\Loan;
use App\Type;
use Illuminate\Http\Request;

class LoansController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	protected $loan, $client, $type;

	public function __construct(Loan $loan, Client $client, Type $type) {
		$this->loan = $loan;
		$this->client = $client;
		$this->type = $type;
	}

	public function index() {

		// $loans = $this->loan->all();
		$loans = $this->loan->with(['clients', 'types', 'payments'])->get();
		return view('loan.index', compact('loans'));
		//return 'this is index method';
		//

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$clients = $this->client->all()->pluck('name', 'id');
		$types = $this->type->all()->pluck('name', 'id');
		//$types = $this->type->distinct('name')->get()->toArray();

		//dd($types);
		return view('loan.create', compact('clients', 'types'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		// return 'this is store method';
		$type_id = $request->type_id;
		$attributes = $request->all();

		// since interest rate is not shown in create form, we calculate here
		$interest = $this->type::find($type_id)->rate;
		$attributes['interest'] = $interest;

		$this->loan->create($attributes);
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

		return 'this is show method';
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
		return 'this is edit method';
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
		return 'this is update method';
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//

		return 'this is destroy method';
	}

	public function getPaymentsByLoanId($id) {
		// >>works perfectly
		$loan = $this->loan->find($id);
		$payments = $loan->payments()->orderBy('id', 'asc')->get();

		return view('loan.custom', compact('payments', 'loan'));

		/* diff in date:: works
			$now = Carbon::today();
			$later = Carbon::today()->addDays(10);
			$diff = $later->diffInDays($now);
			echo $now . '<br>' .$later . '<br>'.$diff;
		*/

		/* test
			$loan = $this->loan->find($id);
			$payments = $loan->payments()->get();
			//return $date = $payments->find(1)->created_at;
			$date = new Carbon($payments->find(1)->created_at);
			$filteredDate = $date->toDateString();
			var_dump($filteredDate);
			$now = Carbon::now()->toDateString();

			/* REFRENCE
			$created = new Carbon($price->created_at);
			$now = Carbon::now();
			$difference = ($created->diff($now)->days < 1)
			    ? 'today'
			    : $created->diffForHumans($now);
		*/

	}
}
