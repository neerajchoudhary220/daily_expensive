<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DefaultUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Girja Choudhary',
                'username' => 'girja123',
                'password' => 'girja123',
            ],
            [
                'name' => 'Neeraj Choudhary',
                'username' => 'neeraj123',
                'password' => 'neeraj123',

            ],
        ];

        foreach ($users as $user) {
            $user = User::updateOrCreate([
                'username' => $user['username'],
            ],
                [
                    'name' => $user['name'],
                    'password' => $user['password'],
                ]
            );

        }

    }
}
