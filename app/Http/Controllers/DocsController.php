<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\App;

class DocsController extends Controller
{

    public function index() {
        return view('docs.index');
    }
    public function adminIndex() {
        return view('docs.admin.index');
    }

    public function appointmentIndex() {
        return view('docs.appointment.index');
    }

    public function calendarIndex() {
        return view('docs.calendar.index');
    }

    public function configIndex() {
        return view('docs.config.index');
    }

    public function memberIndex() {
        return view('docs.member.index');
    }

    public function userIndex() {
        return view('docs.user.index');
    }
}


/*

$app->group(['prefix' => 'user'], function() use ($app) {
    $app->get('/', 'DocsController@user');
});
$app->group(['prefix' => 'appointment'], function() use ($app) {
    $app->get('/', 'DocsController@appointment');
});
$app->group(['prefix' => 'calendar'], function() use ($app) {
    $app->get('/', 'DocsController@calendar');
});
$app->group(['prefix' => 'member'], function() use ($app) {
    $app->get('/', 'DocsController@member');
});
$app->group(['prefix' => 'admin'], function() use ($app) {
    $app->get('/', 'DocsController@admin');
});
$app->group(['prefix' => 'config'], function() use ($app) {
    $app->get('/', 'DocsController@config');
});
 */