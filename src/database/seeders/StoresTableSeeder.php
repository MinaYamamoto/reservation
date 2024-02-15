<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param= [
            'name' => '仙人',
            'genre_id' => '1',
            'region_id' => '1',
            'user_id' => '2',
            'overview' =>'料理長厳選の食材から作る寿司を用いたコースをぜひお楽しみください。食材・味・価格、お客様の満足度を徹底的に追及したお店です。特別な日のお食事、ビジネス接待まで気軽に使用することができます。',
            'thumbnail' => 'sushi.jpg',
        ];
        DB::table('stores')->insert($param);
        $param= [
            'name' => '牛助',
            'genre_id' => '5',
            'region_id' => '2',
            'user_id' => '2',
            'overview' =>'焼肉業界で20年間経験を積み、肉を熟知したマスターによる実力派焼肉店。長年の実績とお付き合いをもとに、なかなか食べられない希少部位も仕入れております。また、ゆったりとくつろげる空間はお仕事終わりの一杯や女子会にぴったりです。',
            'thumbnail' => 'yakiniku.jpg',
        ];
        DB::table('stores')->insert($param);
        $param= [
            'name' => '戦慄',
            'genre_id' => '4',
            'region_id' => '3',
            'user_id' => '2',
            'overview' =>'気軽に立ち寄れる昔懐かしの大衆居酒屋です。キンキンに冷えたビールを、なんと199円で。鳥かわ煮込み串は販売総数100000本突破の名物料理です。仕事帰りに是非御来店ください。',
            'thumbnail' => 'izakaya.jpg',
        ];
        DB::table('stores')->insert($param);
        $param= [
            'name' => 'ルーク',
            'genre_id' => '2',
            'region_id' => '1',
            'user_id' => '2',
            'overview' =>'都心にひっそりとたたずむ、古民家を改築した落ち着いた空間です。イタリアで修業を重ねたシェフによるモダンなイタリア料理とソムリエセレクトによる厳選ワインとのペアリングが好評です。ゆっくりと上質な時間をお楽しみください。',
            'thumbnail' => 'italian.jpg',
        ];
        DB::table('stores')->insert($param);
        $param= [
            'name' => '志摩屋',
            'genre_id' => '3',
            'region_id' => '3',
            'user_id' => '2',
            'overview' =>'ラーメン屋とは思えない店内にはカウンター席はもちろん、個室も用意してあります。ラーメンはこってり系・あっさり系ともに揃っています。その他豊富な一品料理やアルコールも用意しており、居酒屋としても利用できます。ぜひご来店をお待ちしております。',
            'thumbnail' => 'ramen.jpg',
        ];
        DB::table('stores')->insert($param);
    }
}
