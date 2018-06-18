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
use App\Type;
use App\Payment;

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

// for diff in date
Route::get('/date/{id}',function($id){
	$loan = Loan::find($id);
	//return $loan->client_id;
	$relation = $loan->payments()->exists();
	$payment = $loan->payments()->latest()->first();
	//return $payment;	
	
	if($relation){
		$last_date =  $payment->created_at;	
		
		//echo 'relation exists'. '<br>' . $payment->created_at; 
	}else{
		$last_date = $loan->created_at;
		//echo 'relation does not exists'.'<br>'.$loan->created_at;
	}

	//echo 'amount:123 '.'<br>'.'client_id: '.$loan->client_id.'<br>'.'loan_id: '.$id.'<br>'.'type_id: '. $loan->type_id.'<br>','last_date: '.$last_date;
	
	Payment::create([
			'amount'=>123,
			'client_id'=>$loan->client_id,
			'loan_id'=>$id,
			'type_id'=>$loan->type_id,
			'last_date'=>$last_date,
		]);
		


		//return view('loan.custom', compact('payments', 'loan'));
});

Route::group(['middleware' => 'web'], function () {

	Route::resource('types', 'TypesController');
	Route::resource('clients', 'ClientsController');
	Route::resource('loans', 'LoansController');
	Route::resource('payments', 'PaymentsController');

	Route::get('getPaymentsByLoanId/{id}', 'LoansController@getPaymentsByLoanId')->name('loans.getById');

	
});