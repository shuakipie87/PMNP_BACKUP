<?php

namespace App\Http\Requests\Admin;

use Illuminate\{
    Validation\Rules\Password,
    Foundation\Http\FormRequest,
};

class ResetPasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize (): bool {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'token' => ['required'],
            'email' => ['required', 'email', 'string', 'exists:users,email'],
            // reset password
            'password' => [
                'required', 
                'string', 
                Password::min(10)
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
                // 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[@$!%*#?&(~)_+<>/?"{}]).*$/'
            ],
            'password_confirmation' => [
                'required', 
                'string',
                'same:password' 
            ],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            // password
            'password.required' => 'A password is required',
            'password.min' => 'Password minimum lenght is 10',
            // characters
            'password.mixed' => 'special characters [0-9] [a-z] [A-z] [@$!%*#?&(~)_+<>/?"{}]',
            'password.symbols' => 'special characters [0-9] [a-z] [A-z] [@$!%*#?&(~)_+<>/?"{}]',
            'password.numbers' => 'special characters [0-9] [a-z] [A-z] [@$!%*#?&(~)_+<>/?"{}]',
            // confirmed
            'password.uncompromised' => '',
            'password.confirmed' => '',
            // password_confirmation
            'password_confirmation.same' => 'The "password_confirmation" field does not match.'
        ];
    }


}
