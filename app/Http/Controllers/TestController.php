<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class TestController extends Controller
{
    public function index(Request $request) {
        return view('test.index');
    }
}