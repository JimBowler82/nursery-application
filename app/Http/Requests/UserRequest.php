<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        if (request()->method === 'POST') {
            return auth()->user()->isAdmin;
        }

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        if (request()->method === 'POST') {
            return [
                'name' => 'required|max:255',
                'email' => 'required|email|unique:users,email',
                'isAdmin' => ['required', 'boolean', Rule::in([0,1])]
            ];
        }

        return [
            'name' => 'required|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->user->id)],
            'isAdmin' => ['sometimes', 'required', 'boolean', Rule::in([0, 1])]
        ];
    }
}
