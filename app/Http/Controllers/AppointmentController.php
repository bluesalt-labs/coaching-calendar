<?php

namespace App\Http\Controllers;

use App\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use DateTime;

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

    /*
    public function getTest($startDateStr, $endDateStr) {
        //echo "start date string: ". $startDateStr. " end date string: ". $endDateStr . "<br />";

        $startDate = new DateTime($startDateStr);
        $endDate = new DateTime($endDateStr);

        //echo "start date: ". $startDate->format('Y-m-d'). "<br /> end date: ". $endDate->format('Y-m-d')."<br />";
        //echo "(startDate && endDate): ". ($startDate && $endDate)."<br />";
        //echo "(startDate >= endDate): ". ($startDate <= $endDate)."<br />";
        //echo "<hr />";
        //
        //echo Appointment::getByDateRange($startDate, $endDate);
        //
        //return Appointment::getByDateRange($startDate, $endDate);

        // debug
        // return json_encode([
        //     'start_date_str' => $startDateStr,
        //     'end_date_str' => $endDateStr,
        //     'start_date' => $startDate->format(DateTime::ATOM),
        //     'end_date' => $endDate->format(DateTime::ATOM),
        // ]);
    }
    */

    public function getByDateRange(Request $request) {
        $startDateStr = $endDateStr = $endDate = $endDate = null;

        // todo: if request is authorized on back end, $availOnly = false;
        $availOnly = true;

        $appts = array();

        $startDateStr   = $request->input('start_date');
        $endDateStr     = $request->input('end_date');

        if($startDateStr && $endDateStr) {
            $startDate = new DateTime($startDateStr);
            $endDate = new DateTime($endDateStr);

            if( ($startDate && $endDate) && ($startDate <= $endDate) ) {
                $appts = Appointment::getByDateRange($startDate, $endDate);
            }
        }

        return $appts;
    }

    public function schedule(Request $request) {
         $appt = $customer = null;

        $apptID = $request->input('appointment_id');
        if($apptID > 0) { $appt = Appointment::find($apptID); }
        else { /* must include valid appointment id; */ }

        $customerID = $request->input('customer_user_id');
        if($customerID > 0) { $customer = User::find($customerID); }
        else { /* must include valid customer id; */ }

        if($appt && $customer && $appt->isAvailable()) {
            // check for overlapping appointments for this user
            return $appt->schedule($customer->id, Appointment::STATUS_REQUESTED, false);
        }

        return json_encode('{}'); // todo: what should I return? a status?
    }

    /*****************************************************************************************************************/
    /* Admin Functions
    /*****************************************************************************************************************/

    public function addAppointmentTimes(Request $request) {

    }
}
