<?php

use App\Config;
use Illuminate\Database\Seeder;


class ConfigTableSeeder extends Seeder
{
    public function run() {
        Config::create([
            'key'   => 'appointment_length',
            'data'  => "{".
                "'default':{'time':30,'unit':'minutes'}".
            "}",
        ]);
    }
}