<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PembebananForm extends FormRequest
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
            'pembayaranke' => 'required|numeric|min:1|max:3',
            'notransaksi' => 'required|string',
            'tgl_bayar' => 'required|date',
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
            'pembayaranke.required' => 'Pembayaran ke dibutuhkan!',
            'pembayaranke.number' => 'Pembayaran ke harus angka!',
            'pembayaranke.min' => 'Pembayaran ke dibutuhkan!',
            'pembayaranke.max' => 'Pembayaran ke dibutuhkan!',
            'notransaksi.required' => 'No transaksi dibutuhkan!',
            'tgl_bayar.required' => 'Tanggal bayar dibutuhkan!',
            'tgl_bayar.date' => 'Format tanggal bayar salah!',
        ];
    }
}
