<?php

use Illuminate\Database\Seeder;

class KiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Kios::insert([
            [
                'kode'   => 712002,
                'nama'   => 'Hybrid Kepaon',
                'bank'   => 'Mandiri',
                'alamat' => 'Jalan Raya Pemogan No 264A',
            ]
        ]);
    }
}
