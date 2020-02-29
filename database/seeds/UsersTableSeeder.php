<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'user' => 'admin',
            'password' => bcrypt('isatec*19'),
        ]);
        DB::table('users')->insert([
            'name' => 'Jhon Ayrton Saavedra Castañeda',
            'user' => 'shonen',
            'role' => 'superadmin',
            'password' => bcrypt('shonen*19'),
        ]);
        DB::table('users')->insert([
            'name' => 'Teresa Beyrut Paico Marin',
            'user' => 'teresa',
            'role' => 'superadmin',
            'password' => bcrypt('teresa*19'),
        ]);
    }
}
