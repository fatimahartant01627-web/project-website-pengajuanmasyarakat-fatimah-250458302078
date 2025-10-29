<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(array(
            array(
                'name' => 'admin fatim',
                'email' => 'admin@gmail.com',
                'phone' => '8123456789',
                'nik' => '111222333',
                'gender' => 'male',
                'role' => 'admin',
                'password' => bcrypt('12345678')
            ),
            array(
                'name' => 'user fatimah',
                'email' => 'fatimah@gmail.com',
                'phone' => '085389451362',
                'nik' => '223344',
                'gender' => 'male',
                'role' => 'user',
                'password' => bcrypt('12345678')
            ),
        ));
    }
}
