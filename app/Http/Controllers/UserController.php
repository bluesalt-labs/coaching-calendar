<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {  }

    public function getAll(Request $request) {
        return User::all();
    }

    public function getUser($id = null) {
        return User::findOrFail($id);
    }

    public function createUser(Request $request) {
        // if there is data submitted. also, have required fields, and check for duplicate users

        $user = new User();

        $user->save();
        return response()->json($user);

    }

    public function getAppointments($id) {

    }


    //
}
