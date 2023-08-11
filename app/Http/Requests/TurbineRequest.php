<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TurbineRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'blade_grade' => 'required|int|between:1,5',
            'rotor_grade' => 'required|int|between:1,5',
            'hub_grade' => 'required|int|between:1,5',
            'generator_grade' => 'required|int|between:1,5',
        ];
    }
}
