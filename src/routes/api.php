<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return redirect('/health');
});


$router->get('/health', function () use ($router) {
    return $router->app->version();
});

$router->group(["prefix" => "v1"], function () use ($router) {

    $router->get('/customers',                  'CustomerController@index');
    $router->get('/customers/{$code}',          'CustomerController@get');
    $router->post('/customers',                 'CustomerController@store');

});
