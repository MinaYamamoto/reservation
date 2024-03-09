<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsTableSeeder extends Seeder
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
            'star' => 3,
            'comment' => 'テスト用レビューの作成',
            'created_at' => '2024-2-28',
            'updated_at' => '2024-2-28'
        ];
        DB::table('reviews')->insert($param);
        $param = [
            'user_id' => 3,
            'store_id' => 2,
            'star' => 1,
            'comment' => 'テスト用レビューの作成',
            'created_at' => '2024-3-8',
            'updated_at' => '2024-3-8'
        ];
        DB::table('reviews')->insert($param);
    }
}
