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

/**
 * Routes for resource read
 */
$router -> get('read', 'ReadsController@all');
$router -> get('read/{id}', 'ReadsController@get');
$router -> post('read', 'ReadsController@add');
$router -> put('read/{id}', 'ReadsController@put');
$router -> delete('read/{id}', 'ReadsController@remove');
