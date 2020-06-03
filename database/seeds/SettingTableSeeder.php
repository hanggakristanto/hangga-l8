<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'admin_title'   => 'SK Store — Toko Online Sayur No. 1 di Indonesia',
            'admin_footer'  => 'SK Store — Toko Online Sayur No. 1 di Indonesia',
            'site_title'    => 'SK Store — Toko Online Sayur No. 1 di Indonesia',
            'site_footer'   => 'SK Store — Toko Online Sayur No. 1 di Indonesia',
            'email_recived' => 'youremail@gmail.com',
            'city'          => 'logo.png',
            'keywords'      => 'SK Store',
            'description'   => 'SK Store — Toko Online Sayur No. 1 di Indonesia'
        ]);
    }
}
