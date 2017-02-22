<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

//Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'], function() {
Route::group(['prefix' => 'v1'], function() {
    Route::group(['prefix' => 'user'], function() {
        class User extends Illuminate\Database\Eloquent\Model {  }
        Route::get('/', 'UserController@getAll');
        Route::get('get/{id}', 'UserController@get');
        Route::get('getTypes', 'UserController@getTypes');
        Route::get('getBy/email', 'UserController@byEmail');
        Route::get('getBy/type', 'UserController@byType');
        Route::get('validateEmail', 'UserController@validateEmail');
        Route::get('create', 'UserController@create');
        Route::post('create', 'UserController@create');
        Route::delete('delete/{id}', 'UserController@delete');
    });

    Route::group(['prefix' => 'appointment'], function() {
        class Appointment extends Illuminate\Database\Eloquent\Model {  }
        Route::get('/', 'AppointmentController@getAll');
        Route::get('/getByDateRange/', 'AppointmentController@getByDateRange');
        Route::get('get/{id}', 'AppointmentController@get');
        Route::get('getStatuses', 'AppointmentController@getStatuses');
        Route::get('create', 'AppointmentController@create');
        Route::post('create', 'AppointmentController@create');
        Route::post('schedule', 'AppointmentController@schedule');

        //Route::get('getTest/{startDate}/{endDate}', 'AppointmentController@getTest'); // debug
    });

    Route::group(['prefix' => 'calendar'], function() {
        Route::get('/embed/{year}/{month}/{day}', 'CalendarController@getCalendar');
    });

});

