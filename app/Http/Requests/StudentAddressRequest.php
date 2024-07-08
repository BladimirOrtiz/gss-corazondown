<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentAddressRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'postal_code' => 'required|string|max:50',
            'state_name' => 'required|string|max:30',
            'municipality_name' => 'required|string|max:100',
            'colony_name' => 'required|string|max:100',
            'street_name' => 'required|string|max:150',
            'outdoor_number' => 'nullable|string|max:5',
            'internal_number' => 'nullable|string|max:5',
            'geographics_references' => 'required|string|max:60',
        ];
    }
}
