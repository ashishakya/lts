<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get(
    '/user',
    function (Request $request) {
        return $request->user();
    }
);

Route::group(
    ['prefix' => 'clients'],
    function (Router $route) {
        $route->get('', 'ClientController@clientList');
        $route->post('', 'ClientController@create');
        $route->get('/{id}', 'ClientController@clientDetail');
        $route->patch('/{id}', 'ClientController@update');
        $route->delete('/{id}', 'ClientController@delete');
    }
);

Route::get('app/general/data',function (){
    $client = new \GuzzleHttp\Client();
    $uri = 'http://sidalg.staging.yipl.com.np/api/app/general/data';
    $res = $client->request('GET',$uri);
    $body = $res->getBody()->getContents();
    $data = json_decode($body);
    $districts = $data->data->districts;
    foreach ($districts as $district) {
        echo $district-> code . ' ' . $district->name . '<br>';
    }
});

