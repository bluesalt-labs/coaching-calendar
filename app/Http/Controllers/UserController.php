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
     * Get user by email address
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function byEmail(Request $request) {
        return User::where('email', $request->get('email'))->first();
    }

    /**
     * Returns true if this is a valid email that does not already exist
     *
     * @param Request $request
     * @return bool
     */
    public function validateEmail(Request $request) {
        return json_encode(User::validateEmail($request->get('email')) === null);
    }

    /**
     * Create a new user
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string JSON
     */
    public function create(Request $request) {
        $user = new User();

        $email = User::validateEmail( $request->get('email') );
        $type = User::validateType( $request->get('type') );

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


    public function getTypes(){
        return User::getTypes();
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
     * Deletes a user by ID
     *
     * @param  int  $id
     * @return string JSON
     */
    public function delete($id) {
        $ret = array();
        $user = User::find($id);
        if($user){
            $ret['userID'] = $user->id;
            $ret['success'] = ($user ? $user->delete() : false);
        } else {
            $ret['success'] = false;
            $ret['error'] = "user '" . ($id == null ? $id : 'null') . "' not found";
        }

        return response()->json($ret);
    }

    /**
     * @param $id
     */
    public function getAppointments($id) {

    }
}
