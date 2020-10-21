<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KiosForm extends FormRequest
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
            'kode' => 'required|min:6|max:6|unique:kios',
            'nama' => 'required|min:3|max:20'
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
            'kode.required' => 'Kode kios dibutuhkan!',
            'kode.min' => 'Kode kios harus 6 angka!',
            'kode.max' => 'Kode kios harus 6 angka!',
            'kode.unique' => 'Kode kios sudah digunakan!',
            'nama.required' => 'Nama kios dibutuhkan!',
            'nama.min' => 'Nama kios minimal 3 karakter!',
            'nama.max' => 'Nama kios maksimal 20 karakter!'    
        ];
    }
}
