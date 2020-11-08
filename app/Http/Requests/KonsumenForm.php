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
                'nik' => 'required|string|min:12|max:18|unique:konsumen',
                'nama' => 'required|string|min:2|max:50',
                'tmptlahir' => 'required|string|min:2|max:20',
                'tgllahir' => 'required|date',
                'alamatktp' => 'required|string',
                'alamatskrng' => 'required|string',
                'telp' => 'required|numeric|digits_between:5,14',
                'jk' => 'required|string',
                'ibukandung' => 'required|string|min:2|max:50',
                'status' => 'required|string',
                'statusrumah' => 'required|string',
                'lamamenetapbulan' => 'required|integer',
                'pendidikanterakhir' => 'required|string',
                'nama_2' => 'required_if:status,K|string|min:2|max:50',
                'tmptlahir_2' => 'required_if:status,K|string|min:2|max:20',
                'tgllahir_2' => 'required_if:status,K|date',

                'tipe' => 'required|string',
                'perusahaan' => 'required|string|min:2|max:30',
                'masakerja' => 'required|integer',
                'alamat_pekerjaan' => 'required|string',
                'telp_pekerjaan' => 'required|numeric|digits_between:5,14',
                'jabatan' => 'required|string|min:2|max:20',
                'penghasilan' => 'required|integer',
                'perusahaan_2' => 'required_if:status,K|string|min:2|max:30',
                'alamat_pekerjaan_2' => 'required_if:status,K|string',
                'telp_pekerjaan_2' => 'required_if:status,K|numeric|digits_between:5,14',
                'jabatan_2' => 'required_if:status,K|string|min:2|max:20',
                'penghasilan_2' => 'required_if:status,K|integer',

                'nama_darurat' => 'required|string|min:2|max:50',
                'hubungan' => 'required|string|min:4|max:30',
                'alamat_darurat' => 'required|string',
                'telp_darurat' => 'required|numeric|digits_between:5,14',

                // 'gambarktp' => 'required|file|mimes:png,jpeg,jpg',
                // 'gambarkk' => 'required|file|mimes:png,jpeg,jpg',
                // 'gambarktp_2' => 'required|file|mimes:png,jpeg,jpg',
            ];
        } else {
            return [
                'nama' => 'required|string|min:2|max:50',
                'tmptlahir' => 'required|string|min:2|max:20',
                'tgllahir' => 'required|date',
                'alamatktp' => 'required|string',
                'alamatskrng' => 'required|string',
                'telp' => 'required|numeric|digits_between:5,14',
                'jk' => 'required|string',
                'ibukandung' => 'required|string|min:2|max:50',
                'status' => 'required|string',
                'statusrumah' => 'required|string',
                'lamamenetapbulan' => 'required|integer',
                'pendidikanterakhir' => 'required|string',
                'nama_2' => 'required|string|min:2|max:50',
                'tmptlahir_2' => 'required|string|min:2|max:20',
                'tgllahir_2' => 'required|date',

                'tipe' => 'required|string',
                'perusahaan' => 'required|string|min:2|max:30',
                'masakerja' => 'required|integer',
                'alamat_pekerjaan' => 'required|string',
                'telp_pekerjaan' => 'required|numeric|digits_between:5,14',
                'jabatan' => 'required|string|min:2|max:20',
                'penghasilan' => 'required|integer',
                'perusahaan_2' => 'required|string|min:2|max:30',
                'alamat_pekerjaan_2' => 'required|string',
                'telp_pekerjaan_2' => 'required|numeric|digits_between:5,14',
                'jabatan_2' => 'required|string|min:2|max:20',
                'penghasilan_2' => 'required|integer',

                'nama_darurat' => 'required|string|min:2|max:50',
                'hubungan' => 'required|string|min:4|max:30',
                'alamat_darurat' => 'required|string',
                'telp_darurat' => 'required|numeric|digits_between:5,14',
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
