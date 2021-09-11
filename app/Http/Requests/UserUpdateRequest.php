<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'id' => [
                'required',
                'integer',
                'exists:users,id',
            ],
            'name' => [
                'required',
                'string'
            ],
            'email' => [
                'required',
                'string',
                'unique:users,email,'.$this->id.',id',
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
}
