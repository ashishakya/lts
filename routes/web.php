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
use App\Loan;
use App\Client;

Route::get('/', function () {
    return view('welcome');
});

// returns list of clients name for specific loan 
Route::get('loan/client',function(){
	$loan = Loan::find(1);
	foreach ($loan->clients as $client) {
		echo $client->name . ' ';
		# code...
	}
});

// returns list of loans taken by specific client 
Route::get('client/loan',function(){
	$client = Client::find(1);
	return $client->loans;

});

Route::group(['middleware'=>'web'],function(){

	Route::resource('loans','LoansController');	

});