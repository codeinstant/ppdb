<?php

use App\Role;
use Illuminate\Database\Seeder;

class Roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name'    => 'admin',
        ]);

        Role::create([
            'name'    => 'siswa',
        ]);
    }
}
