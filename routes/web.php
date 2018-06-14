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
use App\Type;

Route::get('/', function () {
    return view('welcome');
});

// belongsToMany:returns list of clients name for specific loan 
Route::get('loan/client',function(){
	$loan = Loan::find(1);
	foreach ($loan->clients as $client) {
		echo $client->name . ' ';
		# code...
	}
});

// belongsToMany:returns list of loans taken by specific client 
Route::get('client/loan',function(){
	$client = Client::find(1);
	return $client->loans;
});


//testing hasManyThrough:
Route::get('getClients',function(){
	$type = Type::find(1);
	return $type->clients;
});

//testing hasManyThrough:
Route::get('getLoanType',function(){
	$client = Client::find(1);
	return $client->types;
});


//return clients
Route::get('/readClient',function(){
	return Type::find(1)->clients()->toSql();
});

//return loans
Route::get('/readType',function(){
	 //return Client::find(1)->types()->toSql();
	return Client::find(1)->types;
});




Route::group(['middleware'=>'web'],function(){

	Route::resource('types','LoansController');	

});