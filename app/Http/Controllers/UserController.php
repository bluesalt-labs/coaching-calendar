<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * UserController constructor.
     */
    public function __construct() {  }

    public function getAll(Request $request) {
        return User::all();
    }

    public function get($id = null) {
        return User::findOrFail($id);
    }

    public function create(Request $request) {
        // if there is data submitted. also, have required fields, and check for duplicate users

        $user = new User();

        $user->save();
        return response()->json($user);

    }

    public function getAppointments($id) {

    }


    //
}
