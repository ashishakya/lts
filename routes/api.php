<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Routing\Router;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */
/** @var Route $route */
$route->post('login', 'RegisterController@login')->name('spa.login');

$route->middleware('auth:api')->get(
    '/user',
    function (Request $request) {
        return $request->user();
    }
);

