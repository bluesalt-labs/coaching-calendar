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
        return Appointment::findOrFail($id);
    }

    public function create(Request $request) {
        // if there is data submitted. also, have required fields, and check for duplicate users

        return $request->input('name');
        /*
        $appt = new Appointment();

        $appt->save();
        return response()->json($appt);

        */
    }

    /*****************************************************************************************************************/
    /* Admin Functions
    /*****************************************************************************************************************/

    public function addAppointmentTimes(Request $request) {

    }
}
