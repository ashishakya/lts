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

		$loans = $this->loan->with(['clients', 'types', 'payments'])->get();
		return view('loan.index', compact('loans'));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

		$clients = $this->client->orderBy('id', 'asc')->get();
		$bindContact = $clients->map(function ($client) {
			$client['name_contact'] = $client->name . ' | ' . $client->contact;
			return $client;
		})->pluck('name_contact', 'id');

		// initial code
		//$clients = $this->client->orderBy('id', 'asc')->get()->pluck('name', 'id');
		$types = $this->type->all()->pluck('name', 'id');
		return view('loan.create', compact('bindContact', 'types'));

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$type_id = $request->type_id;
		$attributes = $request->all();

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

		return 'this is destroy method';
	}

	public function getPaymentsByLoanId($id) {
		$loan = $this->loan->find($id);
		$loan_detail = $this->loan->where('id', $id)->with(['types', 'clients'])->first();
		$payments = $loan->payments()->orderBy('id', 'asc')->get();

		return view('loan.custom', compact('payments', 'loan', 'loan_detail'));
	}
}
