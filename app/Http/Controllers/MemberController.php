<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\App;

class MemberController extends Controller
{
    /**
     * If member is logged in, return member dashboard
     */
    public function index() {
        return view('member.index');
    }
}