<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationsTableSeeder extends Seeder
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
            'date' => '2024-2-25',
            'time_id' => 1,
            'num_id' => 1,
        ];
        DB::table('reservations')->insert($param);
        $param = [
            'user_id' => 3,
            'store_id' => 2,
            'date' => '2024-3-7',
            'time_id' => 3,
            'num_id' => 4,
        ];
        DB::table('reservations')->insert($param);
        $param = [
            'user_id' => 3,
            'store_id' => 3,
            'date' => '2024-3-28',
            'time_id' => 6,
            'num_id' => 7,
        ];
        DB::table('reservations')->insert($param);
        $param = [
            'user_id' => 3,
            'store_id' => 4,
            'date' => '2024-4-13',
            'time_id' => 10,
            'num_id' => 2,
        ];
        DB::table('reservations')->insert($param);
    }
}
