<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookmarksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => 3,
            'store_id' => 1,
        ];
        DB::table('bookmarks')->insert($param);
        $param = [
            'user_id' => 3,
            'store_id' => 3,
        ];
        DB::table('bookmarks')->insert($param);
        $param = [
            'user_id' => 3,
            'store_id' => 6,
        ];
        DB::table('bookmarks')->insert($param);
        $param = [
            'user_id' => 3,
            'store_id' => 8,
        ];
        DB::table('bookmarks')->insert($param);
        $param = [
            'user_id' => 3,
            'store_id' => 12,
        ];
        DB::table('bookmarks')->insert($param);
    }
}
