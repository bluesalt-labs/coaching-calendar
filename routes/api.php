<?php

use Illuminate\Http\Request;

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

//Route::group('auth:api', function() {
    Route::group(['prefix' => 'v1'], function() {
        Route::group(['prefix' => 'docs'], function() {
            Route::get('/', 'DocsController@index');
            Route::get('search', 'DocsController@searchIndex');

            Route::group(['prefix' => 'admin'], function() {
                Route::get('/', 'DocsController@adminIndex');
            });
            Route::group(['prefix' => 'appointment'], function() {
                Route::get('/', 'DocsController@appointmentIndex');
            });
            Route::group(['prefix' => 'calendar'], function() {
                Route::get('/', 'DocsController@calendarIndex');
            });
            Route::group(['prefix' => 'config'], function() {
                Route::get('/', 'DocsController@configIndex');
            });
            Route::group(['prefix' => 'member'], function() {
                Route::get('/', 'DocsController@memberIndex');
            });
            Route::group(['prefix' => 'user'], function() {
                Route::get('/', 'DocsController@userIndex');
            });
        });

        Route::group(['prefix' => 'user'], function() {
            class User extends Illuminate\Database\Eloquent\Model {  }
            Route::get('/', 'UserController@getAll');
            Route::get('get/{id}', 'UserController@get');
            Route::post('create', 'UserController@create');
            Route::delete('delete/{id}', 'UserController@delete');
        });

        Route::group(['prefix' => 'appointment'], function() {
            class Appointment extends Illuminate\Database\Eloquent\Model {  }
            Route::get('/', 'AppointmentController@getAll');
            Route::get('/getByDateRange/', 'AppointmentController@getByDateRange');
            Route::get('get/{id}', 'AppointmentController@get');
            Route::post('create', 'AppointmentController@create');
            Route::post('schedule', 'AppointmentController@schedule');

            //Route::get('getTest/{startDate}/{endDate}', 'AppointmentController@getTest'); // debug
        });

        Route::group(['prefix' => 'calendar'], function() {
            Route::get('/embed/{year}/{month}/{day}', 'CalendarController@getCalendar');
        });
    });
//});
