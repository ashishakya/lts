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

Route::get('/', 'LoansController@index');

Route::group(['middleware' => 'web'], function () {

	Route::resource('types', 'TypesController');
	Route::resource('clients', 'ClientsController');
	Route::resource('loans', 'LoansController');
	Route::resource('payments', 'PaymentsController');

	//Route::get('loans/{id}/payments', 'LoansController@getPaymentsByLoanId')->name('loans.getById');
	Route::get('loans/{id}/payments', ['as' => 'loans.getById', 'uses' => 'LoansController@getPaymentsByLoanId']);

	//Route::get('loans/{id}/payments/getPdf', 'PaymentsController@getPdf')->name('payments.getPdf');
	Route::get('loans/{id}/payments/getPdf', ['as' => 'payments.getPdf', 'uses' => 'PaymentsController@getPdf']);

	Route::post('clients/filter', ['as' => 'clients.filter', 'uses' => 'ClientsController@filter']);

	Route::get('dashboard', function () {
		return view('layout.dashboard');
	});

});