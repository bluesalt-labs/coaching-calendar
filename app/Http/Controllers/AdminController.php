<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\App;

class AdminController extends Controller
{
    // The following is for testing only. I don't want to deal with authentication right now.


    /**
     * If admin is logged in, return admin dashboard
     */
    public function index(Request $request) {
        return view('admin.index');
    }

    public function settings(Request $request) {
        return view('admin.settings');
    }
}