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
            // 'kwt_jb' => 'required|file|mimes:png,jpeg,jpg|max:10240',
            'mtr_dpn' => 'required|file|mimes:png,jpeg,jpg|max:10240',
            'mtr_blkng' => 'required|file|mimes:png,jpeg,jpg|max:10240',
            'mtr_kanan' => 'required|file|mimes:png,jpeg,jpg|max:10240',
            'mtr_kiri' => 'required|file|mimes:png,jpeg,jpg|max:10240',
            'nosin' => 'required|file|mimes:png,jpeg,jpg|max:10240',
            'noka' => 'required|file|mimes:png,jpeg,jpg|max:10240',
            'selfie' => 'required|file|mimes:png,jpeg,jpg|max:10240',
        ];
    }
}
