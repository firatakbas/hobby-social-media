<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
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
            'username'              => [
                'required',
                Rule::unique('users', 'username')->ignore(auth()->id()),
            ],
            'email'                 => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore(auth()->id())
            ],
            'password'              => 'nullable|confirmed',
            'password_confirmation' => 'nullable',
            'instagram'             => 'nullable',
            'twitter'               => 'nullable',
            'facebook'              => 'nullable',
            'snapchat'              => 'nullable',
            'website_url'           => 'nullable',
            'biography'             => 'nullable',
        ];
    }

    public function messages(): array
    {
        return [
            'username.required'  => 'Kullanıcı adını boş bırakamazsın',
            'username.unique'    => 'Bu kullanıcı adını başkası kullanıyor, başka bir tane seçin',
            'email.required'     => 'E-posta adresi zorunludur.',
            'email.email'        => 'Lütfen geçerli bir e-posta adresi girin.',
            'email.unique'       => 'Bu e-posta zaten kullanılıyor.',
            'password.confirmed' => 'Şifre ve şifre tekrar alanları aynı olmalıdır.',
        ];
    }
}
