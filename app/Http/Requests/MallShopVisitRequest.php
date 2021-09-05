<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MallShopVisitRequest extends FormRequest
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
            'shopmall_id' => [
                'required',
                'integer',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'shopmall_id.required' => 'Shop ID is required',
        ];
    }
}
