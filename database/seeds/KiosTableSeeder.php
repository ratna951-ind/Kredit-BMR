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
                'alamat' => 'Jl. Raya Pemogan No 264A',
            ],
            [
                'kode'   => 704095,
                'nama'   => 'Hybrid Payangan',
                'bank'   => 'BNI',
                'alamat' => 'Jl. Raya Singapadu',
            ],
            [
                'kode'   => 701045,
                'nama'   => 'Hybrid Abianbase',
                'bank'   => 'BNI',
                'alamat' => 'Jl. Raya Abianbase No.107',
            ],
            [
                'kode'   => 701025,
                'nama'   => 'Hybrid Padangsambian',
                'bank'   => 'Mandiri',
                'alamat' => 'Jl. Tangkuban Perahu',
            ],
            [
                'kode'   => 706805,
                'nama'   => 'Hybrid Banjar',
                'bank'   => 'BNI',
                'alamat' => 'Jl. Seririt Singaraja No 96',
            ],
            [
                'kode'   => 706925,
                'nama'   => 'Hybrid Kalibukbuk',
                'bank'   => 'Mandiri',
                'alamat' => 'Jl. A Yani No 99',
            ],
        ]);
    }
}
