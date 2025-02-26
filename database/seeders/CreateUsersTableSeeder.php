<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            ['username' => 'mocos',
            'email' => 'mocosun@gmail.com',
            'password' => Hash::make('mocos'),
            'bio' => null,
            'icon_image' => 'icon2.png'],
            ['username' => 'yuki',
            'email' => 'yukinco@gmail.com',
            'password' => Hash::make('yuki'),
            'bio' => null,
            'icon_image' => 'icon3.png'],
            ['username' => 'boppina',
            'email' => 'boppina@gmail.com',
            'password' => Hash::make('boppina'),
            'bio' => null,
            'icon_image' => 'icon4.png'],
            ['username' => 'nattsun',
            'email' => 'nattsun@gmail.com',
            'password' => Hash::make('nattsun'),
            'bio' => null,
            'icon_image' => 'icon5.png'],
        ]);
    }
}
