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
                'alamatktp' => 'Jl. Pendidikan Gg. Baja 10A Graha Kerti',
                'alamatskrng' => 'Jl. Pulau Moyo Gg. II No. 9',
                'telp' => '081337654222',
                'jk' => 'P',
                'ibukandung' => 'Nawawi',
                'status' => 'C',
                'statusrumah' => 'Sew',
                'lamamenetapbulan' => 24,
                'pendidikanterakhir' => 'SLTP',
                'nama_2' => null,
                'tmptlahir_2' => null,
                'tgllahir_2' => null,
                'gambarktp' => '5171034406720022-KTP.jpg',
                'gambarkk' => '5171034406720022-KK.jpg',
                'gambarktp_2' => null
            ],
            [
                'nik' => '5171014411790006',
                'nama' => 'Gst Ayu Martha Winingsih',
                'tmptlahir' => 'Kalbar',
                'tgllahir' => '1979-11-04',
                'alamatktp' => 'Jl. Gn Krakatau I/Tamansari 4',
                'alamatskrng' => 'Jl. Pulau Bungin No. 35',
                'telp' => '08123636122',
                'jk' => 'P',
                'ibukandung' => 'Marcelina Holiday',
                'status' => 'K',
                'statusrumah' => 'K',
                'lamamenetapbulan' => 60,
                'pendidikanterakhir' => 'Universitas',
                'nama_2' => 'A.A.Ngurah Roy Kesuma',
                'tmptlahir_2' => 'Majene',
                'tgllahir_2' => '1979-04-25',
                'gambarktp' => '5171014411790006-KTP.jpg',
                'gambarkk' => '5171014411790006-KK.jpg',
                'gambarktp_2' => '5171014411790006-KTP_2.jpg'
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
                'penghasilan' => 5000000,
                'perusahaan_2' => null,
                'alamat_pekerjaan_2' => null,
                'telp_pekerjaan_2' => null,
                'jabatan_2' => null,
                'penghasilan_2' => null
            ],
            [
                'nik' => '5171014411790006',
                'tipe' => 'Non Karyawan',
                'perusahaan' => 'Lava Cake',
                'masakerja' => 12,
                'alamat_pekerjaan' => 'Jl. Pulau Kawe No. 46',
                'telp_pekerjaan' => '08123636122',
                'jabatan' => 'Pemilik',
                'penghasilan' => 3000000,
                'perusahaan_2' => 'Rumah Sakit Surya Medika',
                'alamat_pekerjaan_2' => 'Jl Teuku Umar',
                'telp_pekerjaan_2' => '',
                'jabatan_2' => 'Perawat',
                'penghasilan_2' => 5000000
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
            [
                'nik' => '5171014411790006',
                'nama_darurat' => 'Gst Ngr Martin Widianta',
                'hubungan' => 'Ipar',
                'alamat_darurat' => 'Jln. Gn. Bromo III No. 11',
                'telp_darurat' => '08123603688'
            ],
        ]);
    }
}
