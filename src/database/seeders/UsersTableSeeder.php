<?php

namespace Database\Seeders;

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
        $param = [
            'name' => 'テスト　admin',
            'email' => 'admin@email.com',
            'email_verified_at' => '2024-02-13 21:22:52',
            'password' => \Hash::make('12345678'),
            'role' => 'admin',
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => 'テスト　representative',
            'email' => 'representative@email.com',
            'email_verified_at' => '2024-02-13 21:22:52',
            'password' => \Hash::make('12345678'),
            'role' => 'representative',
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => 'テスト　user',
            'email' => 'user@email.com',
            'email_verified_at' => '2024-02-13 21:22:52',
            'password' => \Hash::make('12345678'),
            'role' => 'user',
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => 'テスト　user1',
            'email' => 'user1@email.com',
            'email_verified_at' => '2024-02-13 21:22:52',
            'password' => \Hash::make('12345678'),
            'role' => 'user',
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => 'テスト　user2',
            'email' => 'user2@email.com',
            'email_verified_at' => '2024-02-13 21:22:52',
            'password' => \Hash::make('12345678'),
            'role' => 'user',
        ];
        DB::table('users')->insert($param);
    }
}
