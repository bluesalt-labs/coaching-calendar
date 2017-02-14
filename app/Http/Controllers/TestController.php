<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class TestController extends Controller
{

    public function __construct(){
        $this->middleware('auth:web');
    }

    public function index(Request $request) {
        return view('test.index');
    }
}