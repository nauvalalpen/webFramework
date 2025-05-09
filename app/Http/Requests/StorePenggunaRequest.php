<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePenggunaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'name' => 'required|string||max:255',
            'email' => 'required|string|email|max:255|unique:penggunas',
            'password' => 'required|min:6|confirmed',
            'phone' => 'nullable|digits_between:9,13',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama harus diisi.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Email harus berupa alamat email yang valid.',
            'email.unique' => 'Email sudah digunakan.',
            'password.required' => 'Password harus diisi.',
            'password.min' => 'Password harus memiliki setidaknya 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'phone.digits_between' => 'Nomor telepon harus berisi antara 9 dan 13 digit.',
        ];
    }


}
