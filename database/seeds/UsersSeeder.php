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
        User::firstOrcreate([
            'name' => 'erdem',
            'email' => 'erdemoflaz4@gmail.com',
            'password' => bcrypt('123456')
        ]);
    }
}
