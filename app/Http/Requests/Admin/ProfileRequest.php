<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'name'      => ['required', 'string'],
            'email'     => ['required', 'email', 'string'],
            // 'password'  => [
            //     'required', 
            //     'string', 
            //     'min:10',
            //     'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[@$!%*#?&(~)_+<>/?"{}]).*$/'
            // ],
            // 'role' => ['required', 'integer'],
            'gender'    => ['required', 'integer'],
            'phone'     => ['required', 'string'],
            'address1'  => ['required', 'string'],
            'address2'  => ['required', 'string']
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
            // name
            'name.required' => 'A title is required',
            // email
            'email.required' => 'A email is required',
            // password
            // 'password.required' => 'A password is required',
            // 'password.min' => 'minimum password length is 10+',
            // 'password.regex' => 'special characters [0-9] [a-z] [A-z] [@$!%*#?&(~)_+<>/?"{}]',
            // role
            // 'role.required' => 'A role is required'
        ];
    }
}
