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
        class User extends Illuminate\Database\Eloquent\Model {  }

        $app->get('user/{id}', function($id) {
            return User::findOrFail($id);
        });
    });

//});

