<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PeranTableSeeder::class);
        $this->call(KiosTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(AngsuranTableSeeder::class);
        $this->call(KonsumenTableSeeder::class);
        $this->call(JadwalOrderTableSeeder::class);
    }
}
