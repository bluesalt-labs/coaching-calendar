<?php

// API Docs

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Sets the site index to the docs
Route::get('/', 'DocsController@index');

Route::group(['prefix' => 'v1/docs'], function() {
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


// Admin Views

Route::group(['prefix' => 'admin'], function() {
    Auth::routes();
    Route::get('/', 'AdminController@index');
    Route::get('settings', 'AdminController@settings');
    Route::get('apiKeys', 'AdminController@apiKeys');


    // Authentication Routes...
    /*
       $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');

       $this->post('login', 'Auth\LoginController@login');
       $this->post('logout', 'Auth\LoginController@logout')->name('logout');

       // Registration Routes...
       $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
       $this->post('register', 'Auth\RegisterController@register');

       // Password Reset Routes...
       $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
       $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
       $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
       $this->post('password/reset', 'Auth\ResetPasswordController@reset');
       */

    Route::group(['prefix' => 'calendar'], function() {
        Route::get('/embed/{year}/{month}/{day}', 'CalendarController@getCalendar');
    });
});

Route::group(['prefix' => 'member'], function() {
    Route::get('/', 'MemberController@index');
});

/*************************************** Testing and debug ***************************************/

Route::group(['prefix' => 'test'], function() {
    Route::get('/', 'TestController@index');
});

/*************************************************************************************************/
