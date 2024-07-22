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
            'star' => 4,
            'comment' => 'コースでいい値段ですが、お店の雰囲気はフォーマルな感じではなく品があっていい雰囲気です。予約して行きましたが、テーブルに感謝のメッセージが書かれてありました。',
            'image'=>'/storage/post_img/yakiniku.jpeg',
            'created_at' => '2024-7-19',
            'updated_at' => '2024-7-19'
        ];
        DB::table('reviews')->insert($param);
        $param = [
            'user_id' => 4,
            'store_id' => 1,
            'star' => 1,
            'comment' => 'テスト用レビューの作成 user1',
            'image'=>'',
            'created_at' => '2024-7-20',
            'updated_at' => '2024-7-20'
        ];
        DB::table('reviews')->insert($param);
        $param = [
            'user_id' => 5,
            'store_id' => 1,
            'star' => 3,
            'comment' => 'テスト用レビューの作成 user2',
            'image'=>'/storage/post_img/izakaya.jpeg',
            'created_at' => '2024-7-19',
            'updated_at' => '2024-7-19'
        ];
        DB::table('reviews')->insert($param);
        $param = [
            'user_id' => 3,
            'store_id' => 2,
            'star' => 1,
            'comment' => 'テスト用レビューの作成 user',
            'image'=>'/storage/post_img/izakaya.jpeg',
            'created_at' => '2024-7-21',
            'updated_at' => '2024-7-21'
        ];
        DB::table('reviews')->insert($param);
        $param = [
            'user_id' => 4,
            'store_id' => 2,
            'star' => 5,
            'comment' => 'テスト用レビューの作成 user1',
            'image'=>'/storage/post_img/yakiniku.jpeg',
            'created_at' => '2024-7-20',
            'updated_at' => '2024-7-20'
        ];
        DB::table('reviews')->insert($param);
        $param = [
            'user_id' => 5,
            'store_id' => 2,
            'star' => 3,
            'comment' => 'テスト用レビューの作成 user2',
            'image'=>'/storage/post_img/izakaya.jpeg',
            'created_at' => '2024-7-21',
            'updated_at' => '2024-7-21'
        ];
        DB::table('reviews')->insert($param);
        $param = [
            'user_id' => 3,
            'store_id' => 5,
            'star' => 5,
            'comment' => 'テスト用のレビュー作成 user',
            'image'=>'/storage/post_img/yakiniku.jpeg',
            'created_at' => '2024-7-19',
            'updated_at' => '2024-7-19'
        ];
        DB::table('reviews')->insert($param);
        $param = [
            'user_id' => 4,
            'store_id' => 5,
            'star' => 4,
            'comment' => 'テスト用レビューの作成 user1',
            'image'=>'/storage/post_img/yakiniku.jpeg',
            'created_at' => '2024-7-20',
            'updated_at' => '2024-7-20'
        ];
        DB::table('reviews')->insert($param);
        $param = [
            'user_id' => 5,
            'store_id' => 5,
            'star' => 5,
            'comment' => 'テスト用レビューの作成 user2',
            'image'=>'/storage/post_img/izakaya.jpeg',
            'created_at' => '2024-7-22',
            'updated_at' => '2024-7-22'
        ];
        DB::table('reviews')->insert($param);
    }
}
