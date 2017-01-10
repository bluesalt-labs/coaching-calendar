<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\App;

class CalendarController extends Controller
{
    public function getCalendar($year = 0, $month = 0, $day = 0) {
        $year   = (int)(is_numeric($year) && $year > 0 ? date('Y') : $year);
        $month  = (int)(is_numeric($month) && $month > 0 ? date('n') : $month);
        $day    = (int)(is_numeric($day) && $day > 0 ? date('j') : $day);

        $today = date("now");

        return view('calendar', array(
            'year'  => $year,
            'month' => $month,
            'day' => $day,
            'today' => $today,
        ));
    }
}