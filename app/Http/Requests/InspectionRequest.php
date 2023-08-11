<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InspectionRequest extends FormRequest
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
            'turbine_id' => 'required|exists:turbines,id',
            'blade_grade' => 'required|int|between:1,5',
            'rotor_grade' => 'required|int|between:1,5',
            'hub_grade' => 'required|int|between:1,5',
            'generator_grade' => 'required|int|between:1,5',
        ];
    }
}
