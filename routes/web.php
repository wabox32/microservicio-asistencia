<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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


$router->group(['prefix' => 'api/v1'], function () use ($router) {

    //students
    $router->get('/students', 'StudentController@index');
    $router->post('/students', 'StudentController@store');
    $router->get('/students/{student}', 'StudentController@show');
    $router->put('/students/{student}', 'StudentController@update');
    $router->delete('/students/{student}', 'StudentController@delete');

    //matters
    $router->get('/matters', 'MatterController@index');
    $router->post('/matters', 'MatterController@store');
    $router->get('/matters/{matter}', 'MatterController@show');
    $router->put('/matters/{matter}', 'MatterController@update');
    $router->delete('/matters/{matter}', 'MatterController@delete');


    //campus
    $router->get('/campus', 'CampuController@index');
    $router->post('/campus', 'CampuController@store');
    $router->get('/campus/{campus}', 'CampuController@show');
    $router->put('/campus/{campus}', 'CampuController@update');
    $router->delete('/campus/{campus}', 'CampuController@delete');


    //lounges
    $router->get('/lounges', 'LoungeController@index');
    $router->post('/lounges', 'LoungeController@store');
    $router->get('/lounges/{lounges}', 'LoungeController@show');
    $router->put('/lounges/{lounges}', 'LoungeController@update');
    $router->delete('/lounges/{lounges}', 'LoungeController@delete');


    //lounges
    $router->get('/assists/{code}', 'AssistController@index');
    $router->post('/assists', 'AssistController@store');


    //qr
    $router->post('/qr', 'QRController@store');





});

$router->group(['middleware' => 'auth:api', 'prefix' => 'api/v1'], function () use ($router) {
    $router->get('/users/me', 'UserController@me');
});
