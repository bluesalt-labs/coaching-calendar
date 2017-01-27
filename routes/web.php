<?php

// API and Back End
//Route::group(['middleware' => 'auth'], function() {
    Route::group(['prefix' => 'api/v1'], function() {
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
    });
    
    Route::group(['prefix' => 'calendar'], function() {
        Route::get('/embed/{year}/{month}/{day}', 'CalendarController@getCalendar');
    });

//});

// Front End

//Route::group(['middleware' => 'admin-auth'], function() {
    Route::group(['prefix' => 'admin'], function() {
        Route::get('/', 'AdminController@index');
    
        Route::group(['prefix' => 'calendar'], function() {
            Route::get('/embed/{year}/{month}/{day}', 'CalendarController@getCalendar');
        });
    });
    
    Route::group(['prefix' => 'member'], function() {
        Route::get('/', 'MemberController@index');
    });
//});

/*************************************** Testing and debug ***************************************/

Route::group(['prefix' => 'test'], function() {
    Route::get('/', 'TestController@index');
});

/*************************************************************************************************/

// Sets the site index to the docs
Route::get('/', 'DocsController@index');
