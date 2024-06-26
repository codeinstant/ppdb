<?php

use App\User;
use Illuminate\Database\Seeder;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'    => 'admin',
            'email'    => 'admin@gmail.com',
            'password'    => bcrypt('admin'),
            'role_id' => 1
        ]);
    }
}
