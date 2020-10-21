<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserForm extends FormRequest
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
                'nama' => 'required|string|min:3|max:50',
                'username' => 'required|string|min:3|max:20|unique:users',
                'password' => 'required|string|min:8|max:20|confirmed',
                'kode_kios' => 'required|integer|min:1',
                'peran_id' => 'required|integer|min:1',
            ];
        } elseif (isset($this->password) || isset($this->password_confirmation)) {
            return [
                'nama' => 'required|string|min:3|max:50',
                'username' => 'required|string|min:3|max:20|unique:users,username,'.$this->id,
                'password' => 'required|string|min:8|max:20|confirmed',
                'kode_kios' => 'required|integer|min:1',
                'peran_id' => 'required|integer|min:1',
            ];
        } else {
            return [
                'nama' => 'required|string|min:3|max:50',
                'username' => 'required|string|min:3|max:20|unique:users,username,'.$this->id,
                'kode_kios' => 'required|integer|min:1',
                'peran_id' => 'required|integer|min:1',
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
