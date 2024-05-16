<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(Roles::class);
        // $this->call(Users::class);

        Role::create([
            'name'    => 'admin',
        ]);

        Role::create([
            'name'    => 'siswa',
        ]);

        User::create([
            'name'    => 'admin',
            'email'    => 'admin@gmail.com',
            'password'    => bcrypt('admin'),
            'role_id' => 1
        ]);
    }
}
