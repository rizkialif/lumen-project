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
    return $router->app->version();
});
$router->get('/produk','ProdukController@tampildata');
$router->get('/produk/{id}','ProdukController@detail');
$router->post('/produk','ProdukController@save');
$router->put('/produk/{id}','ProdukController@update');
$router->delete('/produk/{id}','ProdukController@delete');
