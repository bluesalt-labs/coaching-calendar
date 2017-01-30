<?php

// Front End

//Route::group(['middleware' => 'auth'], function() {
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
