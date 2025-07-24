<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'first_name' => ['required'],
            'last_name'  => ['required'],
            'username'   => ['required'],
            'email'      => ['required', 'email', 'unique:user,email'],
            'password'   => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'Adınız zorunlu',
            'last_name.required' => 'Soyadınız zorunlu',
            'email.required'    => 'E-posta adresi zorunlu',
            'email.email' => 'E-posta formatı yanlış',
            'email.unique'    => 'Böyle bir e-posta var',
            'password.required' => 'Şifreniz zorunlu',
            'username.required' => 'Kullanıcı adı zorunlu'
        ];
    }
}
