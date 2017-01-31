<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run() {
        DB::table('users')->insert([ // id: 0
            'type'          => 1,
            'first_name'    => 'Luke',
            'last_name'     => 'S',
            'email'         => 'luke@bluesaltlabs.com',
            'phone'         => '0000000000',
            'api_token'     => 'udamzt3Z5dk7hn7RmsyojMoRrOlEfqvuThyaUmf97jwHCoM6VTk7m1mrrxMG',
            'password'      => bcrypt('password0'),
        ]);

        DB::table('users')->insert([ // id: 1
            'type'          => 1,
            'first_name'    => 'Bob',
            'last_name'     => 'Smith',
            'email'         => 'bob@smith.com',
            'phone'         => '0000000000',
            'api_token'     => 'amBdSvwQIgQatIxhw93J4ZZk5dmSzsYo9uyZ26KvcsMSqMdNoDWYdQHsotpU',
            'password'      => bcrypt('password1'),
        ]);

        DB::table('users')->insert([ // id: 2
            'type'          => 1,
            'first_name'    => 'Jane',
            'last_name'     => 'Doe',
            'email'         => 'jane@doe.com',
            'phone'         => '0000000000',
            'api_token'     => 'tNiyMtI9fNn3xcxI36l7sVuWeIFBrnr1Mw7cfEiPV3OWewyRwnBKEn3BwNaM',
            'password'      => bcrypt('password2'),
        ]);

        DB::table('users')->insert([ // id: 3
            'type'          => 2,
            'first_name'    => 'Test',
            'last_name'     => 'Member 1',
            'email'         => 'test1@email.com',
            'phone'         => '0000000000',
            'api_token'     => 'Xva1jdO1ZMrD5JQpUvOm3hbnCLpFwF1DkAdBNe3oVXHgpGacqD5yQRMUFKzq',
            'password'      => bcrypt('password3'),
        ]);

        DB::table('users')->insert([ // id: 4
            'type'          => 2,
            'first_name'    => 'Test',
            'last_name'     => 'Member 2',
            'email'         => 'test2@email.com',
            'phone'         => '0000000000',
            'api_token'     => 'KLV2MRHbzMxwfJEEHCYB4mY2Bx0iCcsQbLGgbnvZ43G8Belelp51H4DUGwG9',
            'password'      => bcrypt('password4'),
        ]);

        DB::table('users')->insert([ // id: 5
            'type'          => 2,
            'first_name'    => 'Test',
            'last_name'     => 'Member 3',
            'email'         => 'test3@email.com',
            'phone'         => '0000000000',
            'api_token'     => 'plGuh2VxGpBjPEvi8z9V3FcdNsCjEVqGgufikHQXSEcUrtxRW1JnIdK2UBZv',
            'password'      => bcrypt('password5'),
        ]);
    }
}

