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
        if (!isset($this->id)) {
            return [
                'nik' => 'required|string',
                'nama' => 'required|string',
                'tmptlahir' => 'required|string',
                'tgllahir' => 'required|string',
                'alamatktp' => 'required|string',
                'alamatsekarang' => 'required|string',
                'telp' => 'required|string',
                'jk' => 'required|string',
                'ibukandung' => 'required|string',
                'status' => 'required|string',
                'statusrumah' => 'required|string',
                'lamamenetapbulan' => 'required|string',
                'pendidikanterakhir' => 'required|string',
                'nama_2' => 'required|string',
                'tmptlahir_2' => 'required|string',
                'tgllahir_2' => 'required|string',
                'tipe' => 'required|string',
                'perusahaan' => 'required|string',
                'masakerja' => 'required|string',
                'alamat_pekerjaan' => 'required|string',
                'telp_pekerjaan' => 'required|string',
                'jabatan' => 'required|string',
                'penghasilan' => 'required|string',
                'perusahaan_2' => 'required|string',
                'alamat_pekerjaan_2' => 'required|string',
                'telp_pekerjaan_2' => 'required|string',
                'jabatan_2' => 'required|string',
                'penghasilan_2' => 'required|string',
                'nama_darurat' => 'required|string',
                'hubungan' => 'required|string',
                'alamat_darurat' => 'required|string',
                'telp_darurat' => 'required|string',
                'gambarktp' => 'required|string',
                'gambarkk' => 'required|string',
                'gambarktp_2' => 'required|string',
            ];
        } else {
            return [
                'nama' => 'required|string',
                'tmptlahir' => 'required|string',
                'tgllahir' => 'required|string',
                'alamatktp' => 'required|string',
                'alamatsekarang' => 'required|string',
                'telp' => 'required|string',
                'jk' => 'required|string',
                'ibukandung' => 'required|string',
                'status' => 'required|string',
                'statusrumah' => 'required|string',
                'lamamenetapbulan' => 'required|string',
                'pendidikanterakhir' => 'required|string',
                'nama_2' => 'required|string',
                'tmptlahir_2' => 'required|string',
                'tgllahir_2' => 'required|string',
                'tipe' => 'required|string',
                'perusahaan' => 'required|string',
                'masakerja' => 'required|string',
                'alamat_pekerjaan' => 'required|string',
                'telp_pekerjaan' => 'required|string',
                'jabatan' => 'required|string',
                'penghasilan' => 'required|string',
                'perusahaan_2' => 'required|string',
                'alamat_pekerjaan_2' => 'required|string',
                'telp_pekerjaan_2' => 'required|string',
                'jabatan_2' => 'required|string',
                'penghasilan_2' => 'required|string',
                'nama_darurat' => 'required|string',
                'hubungan' => 'required|string',
                'alamat_darurat' => 'required|string',
                'telp_darurat' => 'required|string',
                'gambarktp' => 'required|string',
                'gambarkk' => 'required|string',
                'gambarktp_2' => 'required|string',
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
            'nama.required' => 'Nama user dibutuhkan!',
            'nama.min' => 'Nama user minimal 3 karakter!',
            'nama.max' => 'Nama user maksimal 50 karakter!',

            'username.required' => 'Username dibutuhkan!',
            'username.min' => 'Username minimal 3 karakter!',
            'username.max' => 'Username maksimal 20 karakter!',
            'username.unique' => 'Username sudah digunakan!',
            
            'password.required' => 'Password dibutuhkan!',
            'password.min' => 'Password minimal 8 karakter!',
            'password.max' => 'Password maksimal 20 karakter!',
            'password.confirmed' => 'Konfirmasi password tidak cocok!',

            'kode_kios.required' => 'Peran dibutuhkan!',
            'kode_kios.integer' => 'Peran harus dipilih!',
            'kode_kios.min' => 'Peran harus dipilih!',

            'peran_id.required' => 'Peran dibutuhkan!',
            'peran_id.integer' => 'Peran harus dipilih!',
            'peran_id.min' => 'Peran harus dipilih!',
        ];
    }
}
