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


$router->post('/auth/login', 'AuthController@login');

//$router->post('/auth/login', ['middleware' => 'auth', 'AuthController@loginPost']);


$router->post('/auth/logout', 'AuthController@logout');

$router->post('refresh', 'AuthController@refresh');

$router->get('/posts', 'PostController@index');

//$router->get('/posts', ['middleware' => 'auth', 'PostController@index']);

$router->post('/posts', 'PostController@create');

//$router->post('/posts', ['middleware' => 'auth', 'PostController@create']);

$router->put('/posts/{postId}', 'PostController@update');
