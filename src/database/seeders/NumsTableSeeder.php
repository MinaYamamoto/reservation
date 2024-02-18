<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'num' => 1,
        ];
        DB::table('nums')->insert($param);
        $param = [
            'num' => 2,
        ];
        DB::table('nums')->insert($param);
        $param = [
            'num' => 3,
        ];
        DB::table('nums')->insert($param);
        $param = [
            'num' => 4,
        ];
        DB::table('nums')->insert($param);
        $param = [
            'num' => 5,
        ];
        DB::table('nums')->insert($param);
        $param = [
            'num' => 6,
        ];
        DB::table('nums')->insert($param);
        $param = [
            'num' => 7,
        ];
        DB::table('nums')->insert($param);
        $param = [
            'num' => 8,
        ];
        DB::table('nums')->insert($param);
        $param = [
            'num' => 9,
        ];
        DB::table('nums')->insert($param);
        $param = [
            'num' => 10,
        ];
        DB::table('nums')->insert($param);
    }
}
