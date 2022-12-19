<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MovieFormRequest extends FormRequest
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
        $rules = [
            'title' => [
                'required',
                'string',
                'max:200'
            ],
            'genre' => [
                'required',
                'string',
                'max:200'
            ],
            'director' => [
                'required',
                'string',
                'max:200'
            ],
            'producer' => [
                'required',
                'string',
                'max:200'
            ],
            'writer' => [
                'required',
                'string',
                'max:200'
            ],
            'casts' => [
                'required',
                'string',
                'max:200'
            ],
            'summary' => [
                'required',
            ],
            'release_date' => [
                'required',
                'string',
                'max:200'
            ],
            'image_path' => [
                'nullable',
                'image'
            ],
        ];
        return $rules;
    }
}
