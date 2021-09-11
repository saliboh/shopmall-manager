<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ShopUpdateRequest extends FormRequest
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
                'exists:shops,id',
            ],
            'user_id' => [
                'required',
                'integer',
                Rule::exists('users', 'id')
                    ->where(function ($query) {
                        return $query->where('role', User::ROLES['store-owner']);
                    }
                ),
            ],
            'name' => [
                'required',
                'string'
            ],
            'floor' => [
                'required',
                'integer'
            ],
            'visit' => [
                'required',
                'integer'
            ],
        ];
    }

    public function messages()
    {
        return [
            'user_id.exists' => 'Account ID must be existing and with permision as store-owner',
        ];
    }
}
