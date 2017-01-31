<?php

use App\Config;
use Illuminate\Database\Seeder;


class ConfigTableSeeder extends Seeder
{
    public function run() {
        DB::table('configs')->insert([
            'key'   => 'appointment_length',
            'data'  => '{'.
                '"default":{"time":30,"unit":"minutes"}'.
            '}',
        ]);
    }
}