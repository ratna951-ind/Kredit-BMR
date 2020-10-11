<?php

use Illuminate\Database\Seeder;

class PeranTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Peran::insert([
            [
                'id' => 1,
                'nama'=> 'Administrator'
            ],
            [
                'id' => 2,
                'nama'=> 'Marketing Credit Executive'
            ],
            [
                'id' => 3,
                'nama'=> 'Unit Head'
            ],
            [
                'id' => 4,
                'nama'=> 'Admin'
            ],
            [
                'id' => 5,
                'nama'=> 'Supervisor'
            ],
            [
                'id' => 6,
                'nama'=> 'Branch Manager'
            ],
        ]);
    }
}
