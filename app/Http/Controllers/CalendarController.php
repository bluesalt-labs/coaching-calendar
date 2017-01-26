<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\App;

class CalendarController extends Controller
{
    public function getCalendar(Request $request, $year = 0, $month = 0, $day = 0) {
        $year   = (int)(is_numeric($year) && $year > 0 ? $year: date('Y'));
        $month  = (int)(is_numeric($month) && $month >= 0 ? $month: date('n'));
        $day    = (int)(is_numeric($day) && $day > 0 ? $day: date('j'));

        return view('calendar.calendar', array(
            'year'  => $year,
            'month' => $month,
            'day'   => $day,
        ));
    }
}