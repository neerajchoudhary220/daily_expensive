<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $users = [
            [
                'name' => 'Girja Choudhary',
                'username' => 'girjachoudhary',
                'password' => 'girja_vamika@069',
            ],
            [
                'name' => 'Neeraj Choudhary',
                'username' => 'neerajchoudhary',
                'password' => 'neeraj_vamika@669',

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
