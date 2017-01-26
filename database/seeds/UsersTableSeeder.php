<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run() {
        User::create([ // id: 0
            'type'     => 1,
            'first_name'    => 'Luke',
            'last_name'     => 'S',
            'email'         => 'luke@bluesaltlabs.com',
            'phone'         => '0000000000',
        ]);

        User::create([ // id: 1
            'type'     => 1,
            'first_name'    => 'Bob',
            'last_name'     => 'Smith',
            'email'         => 'bob@smith.com',
            'phone'         => '0000000000',
        ]);

        User::create([ // id: 2
            'type'     => 1,
            'first_name'    => 'Jane',
            'last_name'     => 'Doe',
            'email'         => 'jane@doe.com',
            'phone'         => '0000000000',
        ]);

        User::create([ // id: 3
            'type'     => 2,
            'first_name'    => 'Test',
            'last_name'     => 'Member 1',
            'email'         => 'test1@email.com',
            'phone'         => '0000000000',
        ]);

        User::create([ // id: 4
            'type'     => 2,
            'first_name'    => 'Test',
            'last_name'     => 'Member 2',
            'email'         => 'test2@email.com',
            'phone'         => '0000000000',
        ]);

        User::create([ // id: 5
            'type'     => 2,
            'first_name'    => 'Test',
            'last_name'     => 'Member 3',
            'email'         => 'test3@email.com',
            'phone'         => '0000000000',
        ]);
    }
}

