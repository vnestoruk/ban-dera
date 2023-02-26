<?php

namespace App\Http\Requests\Target;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreTargetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::hasUser() && Auth::user()->hasAnyRole('admin|moderator');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'url' => 'required|string|unique:App\Models\Target,url',
            'secure' => 'boolean',
            'categories' => 'array',
            'categories.*' => 'exists:categories,key'
        ];
    }
}
