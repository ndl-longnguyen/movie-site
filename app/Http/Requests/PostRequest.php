<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'fullname' => 'required|min:5',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' => 'Please enter your fullname!',
            'fullname.min' => 'Fullname greater than :min character!',
            'email.required' => 'Please enter your email!',
            'email.unique' => 'Email already exists! Please choose another email!',
            'password.required' => 'Please enter your password!',
            'password.min' => 'Password greater than :min character!',
            'password_confirmation.required' => 'Please enter your confirm password!',
            'password_confirmation.same' => 'The confirm password is not correct!',
        ];
    }
}