<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => 'required|unique:posts|min:20|max:255',
            'content' => 'required',
        ];

    }

    /**
    * Get the error messages for the defined validation rules.
    *
    * @return array
    */
    public function messages()
    {
    return [
    'title.required' => ':attribute bắt buộc phải có',
    'content.required' => ':attribute không được để trống',
    ];
    }

    public function attributes()
    {
        return [
            'title' => 'Tiêu đề',
            'content' => 'Nội dung'
        ];
    }

}
