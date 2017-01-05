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

$app->get('/', function () use ($app) {
    return $app->version();
});

//$app->group(['middleware' => 'auth'], function() use ($app) {
    $app->group(['prefix' => 'api/v1'], function() use ($app) {
        $app->group(['prefix' => 'user'], function() use ($app) {
            class User extends Illuminate\Database\Eloquent\Model {  }
            $app->get('/', 'UserController@getAll');
            $app->get('get/{id}', 'UserController@get');
            $app->post('create', 'UserController@create');
        });

        $app->group(['prefix' => 'appointment'], function() use ($app) {
            class Appointment extends Illuminate\Database\Eloquent\Model {  }
            $app->get('/', 'AppointmentController@getAll');
            $app->get('get/{id}', 'AppointmentController@get');
            $app->post('create', 'AppointmentController@create');
        });
    });

//});


// Debug views
$app->get('/', function() {
    return view('front-end');
});

$app->get('admin', function() {
    return view('back-end');
});

