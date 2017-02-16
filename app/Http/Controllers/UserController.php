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

    public function byEmail(Request $request) {
        /*
        $email = $request->get('email');
        $user = User::select('id')->where('email', $email)->first();
        return json_encode($user['id'] !== null && $user['id'] > 0);
        */

        return User::where('email', $request->get('email'))->first();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string JSON
     */
    public function create(Request $request) {
        // if there is data submitted. also, have required fields, and check for duplicate users

        //$user = User::create(array());
        $user = new User();


        $email = User::validateEmail( $request->get('email') );
        $type = User::validateType(  $request->get('type') );

       if($email && $type) {
           $user->email = $email;
           $user->type = $type;
           $user->first_name = $request->get('first_name');
           $user->last_name = $request->get('last_name');
           $user->phone = $request->get('phone');
           $user->api_token = User::getRandomAPIString();
           $user->password = bcrypt( $request->get('password') );


           $user->save();
           return response()->json($user);
        } else {
           $error = "";
           if(!$email) { $error .= "Email Address Exists or is not valid. "; }
           if(!$type) { $error .= "User Type is not valid. "; }

           return response()->json(array(
               'error' => $error,
           ));
        }
    }

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
