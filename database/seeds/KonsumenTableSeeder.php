<?php

use Illuminate\Database\Seeder;

class KonsumenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Konsumen::insert([
            [
                'nik' => '5171034406720022',
                'nama' => 'Sumiyati',
                'tmptlahir' => 'Pasuruan',
                'tgllahir' => '1972-06-04',
                'alamatktp' => 'Jl. Pendidikan Gg. Baja 10A, Graha Kerti',
                'alamatskrng' => 'Jl. Pulau Moyo Gg. II No. 9',
                'telp' => '081337654222',
                'jk' => 'P',
                'ibukandung' => 'Nawawi',
                'status' => 'C',
                'statusrumah' => 'Sew',
                'lamamenetapbulan' => 24,
                'pendidikanterakhir' => 'SLTP',
                'gambarktp' => '5171034406720022-KTP.jpg',
                'gambarkk' => '5171034406720022-KK.jpg',
            ],
        ]);
        App\KonsumenPekerjaan::insert([
            [
                'nik' => '5171034406720022',
                'tipe' => 'Karyawan',
                'perusahaan' => 'Super Electronic',
                'masakerja' => 24,
                'alamat_pekerjaan' => 'Jl. Maluku No. 1A',
                'telp_pekerjaan' => '082147460506',
                'jabatan' => 'Marketing',
                'penghasilan' => 5000000
            ],
        ]);
        App\KonsumenDarurat::insert([
            [
                'nik' => '5171034406720022',
                'nama_darurat' => 'Sofyan Poersalim',
                'hubungan' => 'Anak',
                'alamat_darurat' => 'Jl. Pulau Moyo Gg. II No. 9',
                'telp_darurat' => '087445058971'
            ],
        ]);
    }
}
