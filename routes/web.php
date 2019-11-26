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

//Route::get('/', 'LoansController@index');

use App\Client;
use App\Lts\Transformers\Api\ClientListTransformer;

Route::get('/', 'Auth\LoginController@showLoginForm');


Route::group(
    ['middleware' => 'web'],
    function () {

        Route::resource('types', 'TypesController');
        Route::resource('clients', 'ClientsController');
        Route::resource('loans', 'LoansController');
        Route::resource('payments', 'PaymentsController');
        Route::get('loans/{id}/payments', ['as' => 'loans.getById', 'uses' => 'LoansController@getPaymentsByLoanId']);
        Route::get('loans/{id}/payments/detailView', ['as' => 'payments.detailView', 'uses' => 'PaymentsController@getDetailView']);
        Route::get('loans/{id}/payments/pdf', ['as' => 'payments.pdf', 'uses' => 'PaymentsController@getPdf']);
        //Route::post('clients/filter', ['as' => 'clients.filter', 'uses' => 'ClientsController@filter']);
        Route::get('payments/{id}/interest', ['as' => 'payments.ind.interest', 'uses' => 'PaymentsController@updateIndividualInterest']);
        Route::get('loans/{id}/interest', ['as' => 'payments.all.interest', 'uses' => 'PaymentsController@updateAllInterest']);
        Route::get('logout', 'Auth\LoginController@logout')->name('logout');
        Route::get('excel', 'ClientsController@exportExcel')->name('clientExcel');


        Route::get(
            'curl',
            function () {
                $client = new Client();
                $res    = $client->request('GET', 'form.valet/transform/post');
                $posts  = $res->getBody();

                return $posts;


            }
        );

        Route::get(
            'dashboard',
            function () {
                return view('layout.dashboard');
            }
        );
        Route::get(
            'base',
            function () {
                return view('layout.base');
            }
        );
        Route::get(
            'app',
            function () {
                return view('layout.app');
            }
        );


    }
);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(
    ([
        'prefix' => 'v2',
    ]),
    function () {
        Route::get('/login',
            function () {
                return view('spa.auth.login');
            }
        );
    }
);

