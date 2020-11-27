<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class OrderForm extends FormRequest
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
        if (Auth::user()->peran_id==4) {
            return [
                'cara_bayar' => 'required|string|in:B,C',
                'tgl' => 'required|date',
                'bukti_std' => 'required|file|mimes:png,jpeg,jpg|max:10240',
            ];
        }
        else{
            return [
                'pembatalan' => 'required|string|min:5',
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
            'pembatalan.required' => 'Alasan batal dibutuhkan!',
            'pembatalan.min' => 'Alasan batal harus minimal 6 karakter!',

            'cara_bayar.required' => 'Metode pencairan dibutuhkan!',
            'cara_bayar.in' => 'Metode pencairan dibutuhkan!',

            'tgl.required' => 'Tanggal dibutuhkan!',
            'tgl.date' => 'Tanggal dibutuhkan!',

            'bukti_std.required' => 'Foto bukti pencairan dibutuhkan!',
            'bukti_std.file' => 'Foto bukti pencairan dibutuhkan!',
            'bukti_std.mimes' => 'Foto bukti pencairan harus dalam format gambar!',
            'bukti_std.max' => 'Foto bukti pencairan maksimal 10MB!',
        ];
    }
}
