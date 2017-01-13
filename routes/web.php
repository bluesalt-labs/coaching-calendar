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

// API and Back End
//$app->group(['middleware' => 'auth'], function() use ($app) {
    $app->group(['prefix' => 'api/v1'], function() use ($app) {
        $app->group(['prefix' => 'user'], function() use ($app) {
            class User extends Illuminate\Database\Eloquent\Model {  }
            $app->get('/', 'UserController@getAll');
            $app->get('get/{id}', 'UserController@get');
            $app->post('create', 'UserController@create');
            $app->delete('delete/{id}', 'UserController@delete');

        });

        $app->group(['prefix' => 'appointment'], function() use ($app) {
            class Appointment extends Illuminate\Database\Eloquent\Model {  }
            $app->get('/', 'AppointmentController@getAll');
            $app->get('/getByDateRange/', 'AppointmentController@getByDateRange');
            $app->get('get/{id}', 'AppointmentController@get');
            $app->post('create', 'AppointmentController@create');
            $app->post('schedule', 'AppointmentController@schedule');

            //$app->get('getTest/{startDate}/{endDate}', 'AppointmentController@getTest'); // debug
        });
    });

    $app->group(['prefix' => 'calendar'], function() use ($app) {
        $app->get('/embed/{year}/{month}/{day}', 'CalendarController@getCalendar');
    });

//});

// Front End

//$app->group(['middleware' => 'auth'], function() use ($app) {
    $app->group(['prefix' => 'admin'], function() use ($app) {
        $app->get('/', 'AdminController@index');

        $app->group(['prefix' => 'calendar'], function() use ($app) {
            $app->get('/embed/{year}/{month}/{day}', 'CalendarController@getCalendar');
        });
    });

    $app->group(['prefix' => 'member'], function() use ($app) {
        $app->get('/', 'MemberController@index');
    });
//});


// Member Home page for debug. todo: Change to login page
$app->get('/', 'MemberController@index');


