<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class SignupRequest extends FormRequest
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
                'between:3,18',
                'alpha_dash',
                Rule::unique(User::class, 'nickname'),
                Rule::notIn(User::_RESERVED_NICKNAMES)
            ],
            'email' => [
                'nullable',
                'email',
                Rule::unique(User::class, 'email')
            ],
            'password' => [
                'required',
                Password::min(8)->letters()->numbers(),
                'confirmed'
            ],
        ];
    }

    public function messages()
    {
        return [
            'nickname.not_in' => __('Sorry, :input is reserved nickname.'),
            'email.unique' => __('User with this email is registered already.'),
        ];
    }
}
