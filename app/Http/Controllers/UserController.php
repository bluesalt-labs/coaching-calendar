<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Returns all Users
     * @return string JSON
     */
    public function getAll() {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string JSON
     */
    /*
    public function create(Request $request) {
        // if there is data submitted. also, have required fields, and check for duplicate users

        $user = new User();

        $user->save();
        return response()->json($user);

        //Auth\RegisterController::create();
    }
    */

    /**
     * Returns the specified user.
     *
     * @param  int  $id
     * @return string JSON
     */
    public function get($id) {
        return User::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return string JSON
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return string JSON
     */
    public function delete($id) {
        //
    }

    /**
     * @param $id
     */
    public function getAppointments($id) {

    }
}
