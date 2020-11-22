<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'pembatalan' => 'required|string|min:5',
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
            'pembatalan.required' => 'Alasan batal dibutuhkan!',
            'pembatalan.min' => 'Alasan batal harus minimal 6 huruf!',
        ];
    }
}
