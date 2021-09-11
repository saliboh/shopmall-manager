<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthUserRegisterRequest extends FormRequest
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
            'name' => [
                'required',
                'string'
            ],
            'email' => [
                'required',
                'string',
                'unique:users,email'
            ],
            'password' => [
                'required',
                'string',
            ],
            'role' => [
                'required',
                'regex:(store-owner|shop-manager)',
            ]
        ];
    }

    public function messages()
    {
        return [
            'role.regex' => 'Role should be store-manager or shop-manager only',
        ];
    }
}
