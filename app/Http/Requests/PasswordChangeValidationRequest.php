<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordChangeValidationRequest extends FormRequest
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
            'SystemName' => 'required|string|max:255',
            'UserName' => 'required|string|max:255',
            
        ];
    }
    public function messages(): array
    {
        return [
            'SystemName.required' => 'Please Select System',
            'UserName.required' => 'Please Enter System UserName', 
        ];
    }
}
