<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
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
            'category_id' => [
                'required',
                'integer',
            ],
            'name' => [
                'required',
                'string',
            ],
            'slug' => [
                'required',
                'string',
            ],
            'yt_iframe' => [
                'nullable',
                'string',
            ],
            'description' => [
                'required',
            ],
            'image' => [
                'nullable',
                'image',
            ],
            'meta_title' => [
                'required',
                'string',
            ],
            'meta_description' => [
                'nullable',
                'string',
            ],
            'mete_keyword' => [
                'nullable',
                'string',
            ],
            'status' => [
                'nullable',
            ],
        ];

        return $rules;
    }
}
