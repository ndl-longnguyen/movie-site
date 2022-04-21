<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostMovie extends FormRequest
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
            'title' => 'required|unique:movies',
            'director' => 'required',
            'performer' => 'required',
            'category' => 'required',
            'premiere' => 'nullable',
            'time' => 'nullable|integer',
            'image' => 'required|image',
            'video' => 'required|mimetypes:video/mp4'
        ];
    }
}