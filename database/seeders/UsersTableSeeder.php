<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //②下記コードを記述しましょう。
        DB::table('users')->insert([
            'id' => 1,
            'username' => 'Atlasぽんた',
            'email' => 'ponta@gmail.com',
            'password' => Hash::make('pontakun'),
            'bio' => null,
            'icon_image' => 'icon1.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
