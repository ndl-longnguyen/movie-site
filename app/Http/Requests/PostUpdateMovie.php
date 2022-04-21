<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateMovie extends FormRequest
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
            'title' => 'required',
            'director' => 'required',
            'performer' => 'required',
            'category' => 'required',
            'premiere' => 'nullable',
            'time' => 'nullable|integer',
            'image' => 'nullable|image',
            'video' => 'nullable|mimetypes:video/mp4'
        ];
    }
}