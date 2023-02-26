<?php

namespace App\Http\Requests\Target;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateTargetRequest extends FormRequest
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
            'url' => 'string|unique:App\Models\Target,url,'.$this->id,
            'secure' => 'boolean',
            'approved' => 'boolean',
            'categories' => 'array',
            'categories.*' => 'exists:categories,key'
        ];
    }
}
