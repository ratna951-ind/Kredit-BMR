<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KasBankForm extends FormRequest
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
            'cara_bayar' => 'required|string|in:B,C',
            'jenis' => 'required|string|in:CO,PK,P',
            'jumlah' => 'required|integer|min:5000'
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
            'cara_bayar.required' => 'Metode pencairan dibutuhkan!',
            'cara_bayar.in' => 'Metode pencairan dibutuhkan!',

            'jenis.required' => 'Jenis dibutuhkan!',
            'jenis.in' => 'Jenis dibutuhkan!',

            'jumlah.required' => 'Jumlah dibutuhkan!',
            'jumlah.integer' => 'Jumlah harus angka!',
            'jumlah.min' => 'Jumlah harus besar dari Rp 5.000!',
        ];
    }
}
