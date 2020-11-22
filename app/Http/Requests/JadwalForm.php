<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JadwalForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nik' => 'required|string|min:12|max:18',
            'pinjaman_awal' => 'required|integer|min:2000000|max:16100000',
            'tenor' => 'required|in:6,12,18,24',
            'stnk' => 'required|file|mimes:png,jpeg,jpg|max:10240',
            'bpkb_depan' => 'required|file|mimes:png,jpeg,jpg|max:10240',
            'bpkb_belakang' => 'required|file|mimes:png,jpeg,jpg|max:10240',
            'kwt_jb' => 'file|mimes:png,jpeg,jpg|max:10240',
            'mtr_dpn' => 'required|file|mimes:png,jpeg,jpg|max:10240',
            'mtr_blkng' => 'required|file|mimes:png,jpeg,jpg|max:10240',
            'mtr_kanan' => 'required|file|mimes:png,jpeg,jpg|max:10240',
            'mtr_kiri' => 'required|file|mimes:png,jpeg,jpg|max:10240',
            'nosin' => 'required|file|mimes:png,jpeg,jpg|max:10240',
            'noka' => 'required|file|mimes:png,jpeg,jpg|max:10240',
            'selfie' => 'required|file|mimes:png,jpeg,jpg|max:10240',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nik.required' => 'Konsumen dibutuhkan!',
            'nik.min' => 'Konsumen dibutuhkan!',
            'nik.max' => 'Konsumen dibutuhkan!',

            'pinjaman_awal.required' => 'Jumlah pinjaman dibutuhkan!',
            'pinjaman_awal.integer' => 'Jumlah pinjaman harus angka!',
            'pinjaman_awal.min' => 'Jumlah pinjaman minimal 2.000.000!',
            'pinjaman_awal.max' => 'Jumlah pinjaman maksimal 16.100.000!',

            'tenor.required' => 'Jangka waktu dibutuhkan!',
            'tenor.in' => 'Jangka waktu dibutuhkan!',

            'stnk.required' => 'Foto STNK dibutuhkan!',
            'stnk.file' => 'Foto STNK dibutuhkan!',
            'stnk.mimes' => 'Foto STNK harus dalam format gambar!',
            'stnk.max' => 'Foto STNK maksimal 10MB!',

            'bpkb_depan.required' => 'Foto BPKB depan dibutuhkan!',
            'bpkb_depan.file' => 'Foto BPKB depan dibutuhkan!',
            'bpkb_depan.mimes' => 'Foto BPKB depan harus dalam format gambar!',
            'bpkb_depan.max' => 'Foto BPKB depan maksimal 10MB!',

            'bpkb_belakang.required' => 'Foto BPKB belakang dibutuhkan!',
            'bpkb_belakang.file' => 'Foto BPKB belakang dibutuhkan!',
            'bpkb_belakang.mimes' => 'Foto BPKB belakang harus dalam format gambar!',
            'bpkb_belakang.max' => 'Foto BPKB belakang maksimal 10MB!',

            'kwt_jb.required' => 'Foto kwitansi jual beli dibutuhkan!',
            'kwt_jb.file' => 'Foto kwitansi jual beli dibutuhkan!',
            'kwt_jb.mimes' => 'Foto kwitansi jual beli harus dalam format gambar!',
            'kwt_jb.max' => 'Foto kwitansi jual beli maksimal 10MB!',

            'mtr_dpn.required' => 'Foto motor depan dibutuhkan!',
            'mtr_dpn.file' => 'Foto motor depan dibutuhkan!',
            'mtr_dpn.mimes' => 'Foto motor depan harus dalam format gambar!',
            'mtr_dpn.max' => 'Foto motor depan maksimal 10MB!',

            'mtr_blkng.required' => 'Foto motor belakang dibutuhkan!',
            'mtr_blkng.file' => 'Foto motor belakang dibutuhkan!',
            'mtr_blkng.mimes' => 'Foto motor belakang harus dalam format gambar!',
            'mtr_blkng.max' => 'Foto motor belakang maksimal 10MB!',

            'mtr_kanan.required' => 'Foto motor kanan dibutuhkan!',
            'mtr_kanan.file' => 'Foto motor kanan dibutuhkan!',
            'mtr_kanan.mimes' => 'Foto motor kanan harus dalam format gambar!',
            'mtr_kanan.max' => 'Foto motor kanan maksimal 10MB!',

            'mtr_kiri.required' => 'Foto motor kiri dibutuhkan!',
            'mtr_kiri.file' => 'Foto motor kiri dibutuhkan!',
            'mtr_kiri.mimes' => 'Foto motor kiri harus dalam format gambar!',
            'mtr_kiri.max' => 'Foto motor kiri maksimal 10MB!',

            'nosin.required' => 'Foto nomor mesin dibutuhkan!',
            'nosin.file' => 'Foto nomor mesin dibutuhkan!',
            'nosin.mimes' => 'Foto nomor mesin harus dalam format gambar!',
            'nosin.max' => 'Foto nomor mesin maksimal 10MB!',

            'noka.required' => 'Foto nomor rangka dibutuhkan!',
            'noka.file' => 'Foto nomor rangka dibutuhkan!',
            'noka.mimes' => 'Foto nomor rangka harus dalam format gambar!',
            'noka.max' => 'Foto nomor rangka maksimal 10MB!',

            'selfie.required' => 'Foto selfie dibutuhkan!',
            'selfie.file' => 'Foto selfie dibutuhkan!',
            'selfie.mimes' => 'Foto selfie harus dalam format gambar!',
            'selfie.max' => 'Foto selfie maksimal 10MB!',
        ];
    }
}
