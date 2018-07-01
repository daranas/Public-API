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

$app->get('/', 'MainController@index');
// generate key
$app->get('/key', function () {
    return str_random(32);
});

// auth
$app->post('/login', 'UserController@login');
$app->post('/register', 'UserController@register');

// user
$app->group(['middleware' => 'auth', 'prefix' => 'user'], function () use ($app) {
    $app->get('/', function () {
        echo "Users";
    });
});