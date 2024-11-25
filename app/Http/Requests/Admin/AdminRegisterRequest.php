<?php

namespace App\Http\Requests\Admin;

use App\Rules\PhoneNumber;
use Illuminate\Foundation\Http\FormRequest;

class AdminRegisterRequest extends FormRequest
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
            // register data
            'firstname'         => ['required', 'string'],
            'lastname'          => ['required', 'string'],
            'facility_location' => ['required', 'string'],
            'facility_id'       => ['required', 'string'],
            'email'             => ['required', 'email', 'string', 'unique:users'],
            'phone'             => ['required', 'digits:10', 'numeric', new PhoneNumber],
            'complete_address'  => ['required', 'string'],
            'municipality'      => ['required', 'string'],
            'province'          => ['required', 'string'],
            // register password
            // 'password'  => [
            //     'required', 
            //     'string', 
            //     'min:10',
            //     'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[@$!%*#?&(~)_+<>/?"{}]).*$/'
            // ]
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
            'firstname.required' => 'A firstname, lastname is required',
            'lastname.required' => 'A lastname, lastname is required',
            // email
            'email.required' => 'A email is required',
            // password
            // 'password.required' => 'A password is required',
            // 'password.min' => '',
            // 'password.regex' => 'special characters [0-9] [a-z] [A-z] [@$!%*#?&(~)_+<>/?"{}]',
        ];
    }


}
