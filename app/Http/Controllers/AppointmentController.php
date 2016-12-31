<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {  }

    public function createAppointment(Request $request) {
        // if there is data submitted. also, have required fields, and check for duplicate users

        $appt = new Appointment();



    }

    //
}
