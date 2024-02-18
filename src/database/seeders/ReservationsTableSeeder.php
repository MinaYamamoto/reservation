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
            'store_id' => 2,
            'date' => '2024-2-28',
            'time_id' => 10,
            'num_id' => 3,
        ];
        DB::table('reservations')->insert($param);
    }
}
