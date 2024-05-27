<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonalDataRequest extends FormRequest
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
            'student_name' => 'required',
            'student_lastnames' => 'required',
            'student_birthday' => 'required',
            'student_curp' => 'required',
            'student_gender' => 'required',
            'student_cellphone' => 'required',
            'student_tutor' => 'required',
            
        ];
    }
}
