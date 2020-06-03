<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'name'      => 'Admin SK Store',
            'email'     => 'admin@gmail.com',
            'password'  => bcrypt('password'),
        ]);
    }
}
