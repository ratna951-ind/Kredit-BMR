<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KonsumenForm extends FormRequest
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
        if (!isset($this->nik_lama)) {
            return [
                'nik' => 'required|string|min:12|max:18|unique:konsumen',
                'nama' => 'required|string|min:2|max:50',
                'tmptlahir' => 'required|string|min:2|max:20',
                'tgllahir' => 'required|date',
                'alamatktp' => 'required|string',
                'alamatskrng' => 'required|string',
                'telp' => 'required|numeric|digits_between:5,14',
                'jk' => 'required|string|in:L,P',
                'ibukandung' => 'required|string|min:2|max:50',
                'status' => 'required|string|in:K,BK,C',
                'statusrumah' => 'required|string|in:Sen,K,Sew,KPR,D,L',
                'lamamenetapbulan' => 'required|integer',
                'pendidikanterakhir' => 'required|string|in:SD,SLTP,SLTA,Akademi,Universitas',
                'nama_2' => 'required_if:status,K|string|min:2|max:50',
                'tmptlahir_2' => 'required_if:status,K|string|min:2|max:20',
                'tgllahir_2' => 'required_if:status,K|date',

                'tipe' => 'required|string|in:Karyawan,Non Karyawan',
                'perusahaan' => 'required|string|min:2|max:30',
                'masakerja' => 'required|integer',
                'alamat_pekerjaan' => 'required|string',
                'telp_pekerjaan' => 'nullable|numeric|digits_between:5,14',
                'jabatan' => 'required|string|min:2|max:20',
                'penghasilan' => 'required|integer',
                'perusahaan_2' => 'required_if:status,K|string|min:2|max:30',
                'alamat_pekerjaan_2' => 'nullable|string',
                'telp_pekerjaan_2' => 'nullable|numeric|digits_between:5,14',
                'jabatan_2' => 'nullable|string|min:2|max:20',
                'penghasilan_2' => 'nullable|integer',

                'nama_darurat' => 'required|string|min:2|max:50',
                'hubungan' => 'required|string|min:4|max:30',
                'alamat_darurat' => 'required|string',
                'telp_darurat' => 'required|numeric|digits_between:5,14',

                'gambarktp' => 'required|file|mimes:png,jpeg,jpg|max:10240',
                'gambarkk' => 'required|file|mimes:png,jpeg,jpg|max:10240',
                'gambarktp_2' => 'required_if:status,K|file|mimes:png,jpeg,jpg|max:10240',
            ];
        } else {
            return [
                'nik' => 'required|string|min:12|max:18|unique:konsumen,nik,'.$this->nik_lama.',nik',
                'nama' => 'required|string|min:2|max:50',
                'tmptlahir' => 'required|string|min:2|max:20',
                'tgllahir' => 'required|date',
                'alamatktp' => 'required|string',
                'alamatskrng' => 'required|string',
                'telp' => 'required|numeric|digits_between:5,14',
                'jk' => 'required|string|in:L,P',
                'ibukandung' => 'required|string|min:2|max:50',
                'status' => 'required|string|in:K,BK,C',
                'statusrumah' => 'required|string|in:Sen,K,Sew,KPR,D,L',
                'lamamenetapbulan' => 'required|integer',
                'pendidikanterakhir' => 'required|string|in:SD,SLTP,SLTA,Akademi,Universitas',
                'nama_2' => 'required_if:status,K|string|min:2|max:50',
                'tmptlahir_2' => 'required_if:status,K|string|min:2|max:20',
                'tgllahir_2' => 'required_if:status,K|date',

                'tipe' => 'required|string|in:Karyawan,Non Karyawan',
                'perusahaan' => 'required|string|min:2|max:30',
                'masakerja' => 'required|integer',
                'alamat_pekerjaan' => 'required|string',
                'telp_pekerjaan' => 'nullable|numeric|digits_between:5,14',
                'jabatan' => 'required|string|min:2|max:20',
                'penghasilan' => 'required|integer',
                'perusahaan_2' => 'required_if:status,K|string|min:2|max:30',
                'alamat_pekerjaan_2' => 'nullable|string',
                'telp_pekerjaan_2' => 'nullable|numeric|digits_between:5,14',
                'jabatan_2' => 'nullable|string|min:2|max:20',
                'penghasilan_2' => 'nullable|integer',

                'nama_darurat' => 'required|string|min:2|max:50',
                'hubungan' => 'required|string|min:4|max:30',
                'alamat_darurat' => 'required|string',
                'telp_darurat' => 'required|numeric|digits_between:5,14',

                'gambarktp' => 'file|mimes:png,jpeg,jpg|max:10240',
                'gambarkk' => 'file|mimes:png,jpeg,jpg|max:10240',
                'gambarktp_2' => 'file|mimes:png,jpeg,jpg|max:10240',
            ];
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nik.required' => 'No KTP konsumen dibutuhkan!',
            'nik.min' => 'No KTP konsumen minimal 12 karakter!',
            'nik.max' => 'No KTP konsumen maksimal 18 karakter!',
            'nik.unique' => 'Data konsumen sudah ada!',

            'nama.required' => 'Nama konsumen dibutuhkan!',
            'nama.min' => 'Nama konsumen minimal 2 karakter!',
            'nama.max' => 'Nama konsumen maksimal 50 karakter!',

            'tmptlahir.required' => 'Tempat lahir konsumen dibutuhkan!',
            'tmptlahir.min' => 'Tempat lahir konsumen minimal 2 karakter!',
            'tmptlahir.max' => 'Tempat lahir konsumen maksimal 20 karakter!',

            'tgllahir.required' => 'Tanggal lahir konsumen dibutuhkan!',
            'tgllahir.date' => 'Format tanggal lahir konsumen salah!',

            'alamatktp.required' => 'Alamat KTP konsumen dibutuhkan!',

            'alamatskrng.required' => 'Alamat konsumen sekarang dibutuhkan!',

            'telp.required' => 'Nomor telepon konsumen dibutuhkan!',
            'telp.numeric' => 'Nomor telepon konsumen harus angka!',
            'telp.digits_between' => 'Nomor telepon konsumen tidak tersedia!',

            'jk.required' => 'Jenis kelamin konsumen dibutuhkan!',
            'jk.in' => 'Jenis kelamin konsumen dibutuhkan!',

            'ibukandung.required' => 'Ibu kandung konsumen dibutuhkan!',
            'ibukandung.min' => 'Ibu kandung konsumen minimal 2 karakter!',
            'ibukandung.max' => 'Ibu kandung konsumen maksimal 50 karakter!',

            'status.required' => 'Status konsumen dibutuhkan!',
            'status.in' => 'Status konsumen dibutuhkan!',

            'statusrumah.required' => 'Status rumah konsumen dibutuhkan!',
            'statusrumah.in' => 'Status rumah konsumen dibutuhkan!',

            'lamamenetapbulan.required' => 'Lama menetap konsumen dibutuhkan!',
            'lamamenetapbulan.integer' => 'Lama menetap konsumen harus angka!',

            'pendidikanterakhir.required' => 'Pendidikan terakhir konsumen dibutuhkan!',
            'pendidikanterakhir.in' => 'Pendidikan terakhir konsumen dibutuhkan!',

            'nama_2.required_if' => 'Nama pasangan konsumen dibutuhkan!',
            'nama_2.min' => 'Nama pasangan konsumen minimal 2 karakter!',
            'nama_2.max' => 'Nama pasangan konsumen maksimal 50 karakter!',

            'tmptlahir_2.required_if' => 'Tempat lahir pasangan konsumen dibutuhkan!',
            'tmptlahir_2.min' => 'Tempat lahir pasangan konsumen minimal 2 karakter!',
            'tmptlahir_2.max' => 'Tempat lahir pasangan konsumen maksimal 20 karakter!',

            'tgllahir_2.required_if' => 'Tanggal lahir pasangan konsumen dibutuhkan!',
            'tgllahir_2.date' => 'Format tanggal lahir pasangan konsumen salah!',

            'tipe.required' => 'Tipe pekerjaan konsumen dibutuhkan!',
            'tipe.in' => 'Tipe pekerjaan konsumen dibutuhkan!',
            
            'perusahaan.required' => 'Perusahaan konsumen dibutuhkan!',
            'perusahaan.min' => 'Perusahaan konsumen minimal 2 karakter!',
            'perusahaan.max' => 'Perusahaan konsumen maksimal 30 karakter!',

            'masakerja.required' => 'Masa kerja konsumen dibutuhkan!',
            'masakerja.integer' => 'Masa kerja konsumen harus angka!',

            'alamat_pekerjaan.required' => 'Alamat perusahaan konsumen dibutuhkan!',

            'telp_pekerjaan.numeric' => 'Nomor telepon pekerjaan konsumen harus angka!',
            'telp_pekerjaan.digits_between' => 'Nomor telepon pekerjaan konsumen tidak tersedia!',

            'jabatan.required' => 'Jabatan konsumen dibutuhkan!',
            'jabatan.min' => 'Jabatan konsumen minimal 2 karakter!',
            'jabatan.max' => 'Jabatan konsumen maksimal 20 karakter!',

            'penghasilan.required' => 'Penghasilan konsumen dibutuhkan!',
            'penghasilan.integer' => 'Penghasilan konsumen harus angka!',

            'perusahaan_2.required_if' => 'Perusahaan pasangan konsumen dibutuhkan!',
            'perusahaan_2.min' => 'Perusahaan pasangan konsumen minimal 2 karakter!',
            'perusahaan_2.max' => 'Perusahaan pasangan konsumen maksimal 30 karakter!',

            'telp_pekerjaan_2.numeric' => 'Nomor telepon pekerjaan pasangan konsumen harus angka!',
            'telp_pekerjaan_2.digits_between' => 'Nomor telepon pekerjaan pasangan konsumen tidak tersedia!',

            'jabatan_2.min' => 'Jabatan pasangan konsumen minimal 2 karakter!',
            'jabatan_2.max' => 'Jabatan pasangan konsumen maksimal 20 karakter!',

            'penghasilan_2.integer' => 'Penghasilan pasangan konsumen harus angka!',

            'nama_darurat.required' => 'Nama darurat konsumen dibutuhkan!',
            'nama_darurat.min' => 'Nama darurat konsumen minimal 2 karakter!',
            'nama_darurat.max' => 'Nama darurat konsumen maksimal 50 karakter!',

            'hubungan.required' => 'Hubungan darurat konsumen dibutuhkan!',
            'hubungan.min' => 'Hubungan darurat konsumen minimal 2 karakter!',
            'hubungan.max' => 'Hubungan darurat konsumen maksimal 30 karakter!',

            'alamat_darurat.required' => 'Alamat darurat konsumen dibutuhkan!',

            'telp_darurat.required' => 'Nomor telepon darurat konsumen dibutuhkan!',
            'telp_darurat.numeric' => 'Nomor telepon darurat konsumen harus angka!',
            'telp_darurat.digits_between' => 'Nomor telepon darurat konsumen tidak tersedia!',

            'gambarktp.required' => 'Foto KTP konsumen dibutuhkan!',
            'gambarktp.file' => 'Foto KTP konsumen dibutuhkan!',
            'gambarktp.mimes' => 'Foto KTP konsumen harus dalam format gambar!',
            'gambarktp.max' => 'Foto KTP konsumen maksimal 10MB!',

            'gambarkk.required' => 'Foto KK konsumen dibutuhkan!',
            'gambarkk.file' => 'Foto KK konsumen dibutuhkan!',
            'gambarkk.mimes' => 'Foto KK konsumen harus dalam format gambar!',
            'gambarkk.max' => 'Foto KK konsumen maksimal 10MB!',

            'gambarktp_2.required_if' => 'Foto KTP pasangan konsumen dibutuhkan!',
            'gambarktp_2.file' => 'Foto KTP pasangan konsumen dibutuhkan!',
            'gambarktp_2.mimes' => 'Foto KTP pasangan konsumen harus dalam format gambar!',
            'gambarktp_2.max' => 'Foto KTP pasangan konsumen maksimal 10MB!',
        ];
    }
}
