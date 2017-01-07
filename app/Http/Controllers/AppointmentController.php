<?php

namespace App\Http\Controllers;

use App\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AppointmentController extends Controller
{
    /**
     * AppointmentController constructor.
     */
    public function __construct() {  }

    public function getAll(Request $request) {
        return Appointment::all();
    }

    public function get($id = null) {
        // todo: should I change this to find and if returns null, say something like, appointment not found?
        return Appointment::findOrFail($id);
    }

    public function create(Request $request) {
        // if there is data submitted. also, have required fields, and check for duplicate users

        // parse attributes and do error checking, etc.

        /*
        $attributes = array();

        // either return this or do something with it. maybe return a status code?
        return Appointment::create($attributes);
        */
    }

    public function schedule(Request $request) {
         $appt = null;
         $customer = null;

        $apptID = $request->input('appointment_id');
        if($apptID > 0) { $appt = Appointment::find($apptID); }
        else {
            // must include valid appointment id
        }

        $customerID = $request->input('customer_user_id');
        if($customerID > 0) { $customer = User::find($customerID); }
        else {
            // must include valid customer id;
        }

        if($appt && $customer && $appt->isAvailable()) {
            // check for overlapping appointments for this user
            return $appt->schedule($customer->id, Appointment::STATUS_REQUESTED, false);
        }


        return false;
    }

    /*****************************************************************************************************************/
    /* Admin Functions
    /*****************************************************************************************************************/

    public function addAppointmentTimes(Request $request) {

    }
}
