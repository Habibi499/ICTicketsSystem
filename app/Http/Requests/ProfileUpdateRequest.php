<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'string',
                'max:255',
                Rule::unique('users')->ignore(Auth::user())
            ],
            'password' => [
                'nullable',
                'string',
                'confirmed',
                'min:5',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/', // Password must contain at least one lowercase, one uppercase, and one digit
            ],
        ];
        
    }
// Custom error messages
public function messages()
{
    return [
        'password.regex' => 'The :attribute must contain at least one capital letter, one small letter, and at least one digit.',
    ];
}
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        if ($this->password == null) {
            $this->request->remove('password');
        }
    }
}