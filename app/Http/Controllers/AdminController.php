<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\App;

class AdminController extends Controller
{
    /**
     * If admin is logged in, return admin dashboard
     */
    public function index() {
        return view('admin.index');
    }
}