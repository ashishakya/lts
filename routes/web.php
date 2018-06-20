<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
use App\Client;
use App\Loan;
use App\Payment;
use App\Type;
use Carbon\Carbon;

Route::get('/', function () {
	return view('welcome');
});

// belongsToMany:returns list of clients name for specific loan
Route::get('loan/client', function () {
	$loan = Loan::find(1);
	foreach ($loan->clients as $client) {
		echo $client->name . ' ';
		# code...
	}
});

// belongsToMany:returns list of loans taken by specific client
Route::get('client/loan', function () {
	$client = Client::find(1);
	return $client->loans;
});

//testing hasManyThrough:
Route::get('getClients', function () {
	$type = Type::find(1);
	return $type->clients;
});

//testing hasManyThrough:
Route::get('getLoanType', function () {
	$client = Client::find(1);
	return $client->types;
});

//return clients
Route::get('/readClient', function () {
	return Type::find(1)->clients()->toSql();
});

//return loans
Route::get('/readType', function () {
	//return Client::find(1)->types()->toSql();
	return Client::find(1)->types;
});

//create loan
Route::get('/createLoan', function () {
	$client_id = Client::find(1)->id;
	$type = Type::find(2);
	$type_id = $type->id;
	$interest = $type->rate;

	Loan::create([
		'client_id' => $client_id,
		'type_id' => $type_id,
		'amount' => 100000,
		'interest' => $interest,
	]);
});

//client hasMany loans
Route::get('client/allLoan', function () {
	$client = Client::find(1);
	foreach ($client->loans as $loan) {
		# code...
		echo $loan . '<br><br>';
	}
});

//loan hasMany payments
Route::get('loan/allPayment', function () {
	$loan = Loan::find(2);
	return $loan->payments;
});

//difference in carbon dates
Route::get('dateTest/{id}', function ($id) {
	$payment = Payment::find($id);
	$created_date = $payment->created_at->startOfDay();
	$createdDate = $payment->created_at->toDateString();
	$lastDate = Carbon::parse($payment->last_date)->toDateString();
	$last_date = (new Carbon($payment->last_date))->endOfDay();;

	//dd($last_date);
	dump($createdDate, $lastDate);
	dd(Carbon::parse($createdDate)->diffInDays(Carbon::parse($lastDate)));
	$diff = $last_date->diffInDays($created_date);
	echo 'created date: ' . $created_date . '<br>' . 'last date: ' . $last_date . '<br>' . 'Diff ' . $diff;
});

// for diff in date
Route::get('/date/{id}', function ($id) {
	$loan = Loan::find($id);
	//return $loan->client_id;
	$relation = $loan->payments()->exists();
	$payment = $loan->payments()->latest()->first();
	//return $payment;

	if ($relation) {
		$last_date = $payment->created_at;

		//echo 'relation exists'. '<br>' . $payment->created_at;
	} else {
		$last_date = $loan->created_at;
		//echo 'relation does not exists'.'<br>'.$loan->created_at;
	}

	Payment::create([
		'amount' => 123,
		'client_id' => $loan->client_id,
		'loan_id' => $id,
		'type_id' => $loan->type_id,
		'last_date' => $last_date,
	]);

	//echo 'amount:123 '.'<br>'.'client_id: '.$loan->client_id.'<br>'.'loan_id: '.$id.'<br>'.'type_id: '. $loan->type_id.'<br>','last_date: '.$last_date;

	//return view('loan.custom', compact('payments', 'loan'));
});

// for diff in principal amount:
Route::get('diffInAmount/{id}', function ($id) {
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
});

//update Interest amount in payment table:
Route::get('updateInterest/{id}', function ($id) {
	$loan = Loan::find($id);
	foreach ($loan->payments as $payment) {
		//$payment->id . ' ';
		$principal = $payment->pbp;
		$payment_date = $payment->created_at->toDateString(); // it is in carbob
		$past_date = Carbon::parse($payment->last_date);
		$last_date = $past_date->toDateString(); // it is in carbob
		$diff = Carbon::parse($last_date)->diffInDays(Carbon::parse($payment_date));
		$interest_rate = $loan->interest;
		$interest_amount = ($principal * $diff * $interest_rate) / (365 * 100);

		//echo 'id: ' . $payment->id . '>>>' . 'interest_amount.' . $interest_amount . '<br>';

		$pay = Payment::find($payment->id);
		$pay->update(['interest_amount' => $interest_amount]);

		//$flight = App\Flight::find(1);

		// $pay->interest_amount = $interest_amount;
		// $pay->save();
	}

});

Route::group(['middleware' => 'web'], function () {

	Route::resource('types', 'TypesController');
	Route::resource('clients', 'ClientsController');
	Route::resource('loans', 'LoansController');
	Route::resource('payments', 'PaymentsController');

	Route::get('loans/{id}/payments', 'LoansController@getPaymentsByLoanId')->name('loans.getById');

});