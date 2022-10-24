<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use function bcrypt;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'admin',
                'password' => bcrypt('admin@123'),
                'role' => 0,'tennv'=>'admin',
                'diachi'=>'techasians',
                'email'=>'tech@gmail.com',
                'is_active' => 1
            ],
        ]);
    }
}
