<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendTokenForgotPasswordRequest extends FormRequest
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
            'email' => 'required|exists:users'
        ];
    }

    /**
     * Default custom message
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'You need to enter email!',
            'email.exists' => 'This email is not registered!'
        ];
    }
}