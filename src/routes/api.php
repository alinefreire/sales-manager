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

    $router->get('/customers', 'CustomerController@index');
    $router->get('/customers/{id}', 'CustomerController@show');
    $router->post('/customers', 'CustomerController@store');
    $router->put('/customers/{id}', 'CustomerController@update');
    $router->delete('/customers/{id}', 'CustomerController@remove');

    $router->get('/products', 'ProductController@index');
    $router->get('/products/{id}', 'ProductController@show');
    $router->post('/products', 'ProductController@store');
    $router->put('/products/{id}', 'ProductController@update');
    $router->delete('/products/{id}', 'ProductController@remove');

    $router->get('/orders', 'SalesOrderController@index');
    $router->get('/orders/{id}', 'SalesOrderController@show');
    $router->post('/orders', 'SalesOrderController@store');
    $router->put('/orders/{id}', 'SalesOrderController@update');
    $router->delete('/orders/{id}', 'SalesOrderController@remove');
});
