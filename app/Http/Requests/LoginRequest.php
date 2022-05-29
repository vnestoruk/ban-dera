<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LoginRequest extends FormRequest
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
            'nickname' => [
                'required',
                Rule::exists(User::class, 'nickname')
            ],
            'password' => [
                'required'
            ]
        ];
    }

    public function messages()
    {
        return [
            'nickname.exists' => __('Can\'t find user with this nickname.')
        ];
    }
}
