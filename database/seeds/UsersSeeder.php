<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Andrey',
                'email' => 'andriy.tarusin@binary-studio.com',
                'password' => '123456'
            ],
            [
                'name' => 'User',
                'email' => 'user@example.com',
                'password' => '123456'
            ],
        ];

        for ($i = 0; $i < count($users); $i++) {
            User::create($users[$i]);
        }
    }
}
