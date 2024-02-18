<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(GenresTableSeeder::class);
        $this->call(RegionsTableSeeder::class);
        $this->call(StoresTableSeeder::class);
        $this->call(BookmarksTableSeeder::class);
        $this->call(TimesTableSeeder::class);
        $this->call(NumsTableSeeder::class);
        $this->call(ReservationsTableSeeder::class);
    }
}
