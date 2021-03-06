<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientsRequest extends FormRequest
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
            'last_name'  => 'required',
            'first_name' => 'required',
            'email'      => 'nullable|email',
            'birth_date' => 'nullable|date|before:today',
            'mobile_number' =>'nullable|regex:/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/',
            'phone_number' => 'nullable|regex:/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/',
        ];
    }
}
