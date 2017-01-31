<?php

use App\Appointment;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AppointmentsTableSeeder extends Seeder
{
    public function run() {
        // todo: figure out how to make a bunch of random appointments that don't overlap
        $date = Carbon::create(date('Y'), date('m'), 30, 8, 0, 0);
        $date1Start = $date->toDateTimeString();

        $date = Carbon::create(date('Y'), date('m'), 30, 8, 30, 0);
        $date1End = $date->toDateTimeString();

        $date = Carbon::create(date('Y'), date('m'), 30, 9, 0, 0);
        $date2Start = $date->toDateTimeString();

        $date = Carbon::create(date('Y'), date('m'), 30, 9, 30, 0);
        $date2End = $date->toDateTimeString();

        $date = Carbon::create(date('Y'), date('m'), 30, 10, 0, 0);
        $date3Start = $date->toDateTimeString();

        $date = Carbon::create(date('Y'), date('m'), 30, 10, 30, 0);
        $date3End = $date->toDateTimeString();

        DB::table('appointments')->insert([
            'start_datetime'    => $date1Start,
            'end_datetime'      => $date1End,
            'type'              => 1,
            'status'            => 0,
            'coach_user_id'     => 2,
            'customer_user_id'  => 3,
        ]);

        DB::table('appointments')->insert([
            'start_datetime'    => $date2Start,
            'end_datetime'      => $date2End,
            'type'              => 1,
            'status'            => 0,
            'coach_user_id'     => 2,
            'customer_user_id'  => 4,
        ]);

        DB::table('appointments')->insert([
            'start_datetime'    => $date3Start,
            'end_datetime'      => $date3End,
            'type'              => 1,
            'status'            => 0,
            'coach_user_id'     => 2,
            'customer_user_id'  => 5,
        ]);
    }
}

