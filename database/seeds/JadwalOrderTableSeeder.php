<?php

use Illuminate\Database\Seeder;

class JadwalOrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\JadwalOrder::insert([
            [
                'id' => 1,
                'user_id' => 17,
                'nik' => '5171034406720022',
                'no_kontrak' => '712002549120',
                'tgl_jadwal' => '2020-12-15',
                'tgl_order' => '2020-12-15',
                'tgl_selesai' => '2021-12-15',
                'harga_barang' => 26000000,
                'pinjaman_awal' => 16100000,
                'pinjaman_disetujui' => 16100000,
                'tenor' => 12,
                'angsuran' => 1759000,
                'adm' => 1150000,
                'stnk' => '5171034406720022-1-STNK.jpg',
                'bpkb_depan' => '5171034406720022-1-BPKBDepan.jpg',
                'bpkb_belakang' => '5171034406720022-1-BPKBBelakang.jpg',
                'kwt_jb' => null,
                'mtr_dpn' => '5171034406720022-1-MotorDepan.jpg',
                'mtr_blkng' => '5171034406720022-1-MotorBelakang.jpg',
                'mtr_kanan' => '5171034406720022-1-MotorKanan.jpg',
                'mtr_kiri' => '5171034406720022-1-MotorKiri.jpg',
                'nosin' => '5171034406720022-1-NoMesin.jpg',
                'noka' => '5171034406720022-1-NoRangka.jpg',
                'selfie' => '5171034406720022-1-Selfie.jpg',
                'status' => 'S',
                'pembatalan' => null
            ],
            [
                'id' => 2,
                'user_id' => 17,
                'nik' => '5171014411790006',
                'no_kontrak' => '712002545120',
                'tgl_jadwal' => '2020-12-14',
                'tgl_order' => '2020-12-14',
                'tgl_selesai' => '2022-06-14',
                'harga_barang' => 13100000,
                'pinjaman_awal' => 9700000,
                'pinjaman_disetujui' => 9700000,
                'tenor' => 18,
                'angsuran' => 806000,
                'adm' => 1150000,
                'stnk' => '5171014411790006-1-STNK.jpg',
                'bpkb_depan' => '5171014411790006-1-BPKBDepan.jpg',
                'bpkb_belakang' => '5171014411790006-1-BPKBBelakang.jpg',
                'kwt_jb' => null,
                'mtr_dpn' => '5171014411790006-1-MotorDepan.jpg',
                'mtr_blkng' => '5171014411790006-1-MotorBelakang.jpg',
                'mtr_kanan' => '5171014411790006-1-MotorKanan.jpg',
                'mtr_kiri' => '5171014411790006-1-MotorKiri.jpg',
                'nosin' => '5171014411790006-1-NoMesin.jpg',
                'noka' => '5171014411790006-1-NoRangka.jpg',
                'selfie' => '5171014411790006-1-Selfie.jpg',
                'status' => 'S',
                'pembatalan' => null
            ],
        ]);
        App\KasBank::insert([
            [
                'id' => 1,
                'kode_kios' => 712002,
                'order_id' => 2,
                'cara_bayar' => 'C',
                'jenis' => 'P',
                'jumlah' => 9700000,
                'sisa' => 20300000,
                'tgl' => '2020-12-14',
                'bukti_std' => '5171014411790006-2-Pencairan.jpg'
            ],
            [
                'id' => 2,
                'kode_kios' => 712002,
                'order_id' => 1,
                'cara_bayar' => 'B',
                'jenis' => 'P',
                'jumlah' => 16100000,
                'sisa' => 4200000,
                'tgl' => '2020-12-15',
                'bukti_std' => '5171034406720022-1-Pencairan.jpg'
            ],
        ]);
    }
}
