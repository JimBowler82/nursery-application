<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property mixed $centre
 */
class CentreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        if(request()->method === 'POST') {
            return [
                'name' => 'required|max:255|unique:centres,name',
                'type' => ['required', Rule::in(['centre', 'setting'])],
                'description' => 'nullable'
            ];
        }

        return [
            'name' => ['required', 'max:255', Rule::unique('centres')->ignore($this->centre)],
            'type' => ['required', Rule::in(['centre', 'setting'])],
            'description' => 'nullable'
        ];
    }
}
