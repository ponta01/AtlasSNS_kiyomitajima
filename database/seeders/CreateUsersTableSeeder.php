<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CreateUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //下記コードを記述しましょう。
        DB::table('users')->insert([
            ['username' => 'ponpon',
            'email' => 'ponsan@gmail.com',
            'password' => Hash::make('ponpon'),
            'bio' => null,
            'icon_image' => 'icon1.png'],
        ]);
    }
}
