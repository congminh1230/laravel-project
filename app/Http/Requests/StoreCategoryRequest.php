<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:posts|min:20|max:255',
            'content' => 'required',
        ];
    }
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
            'name' => 'Tiêu đề',
            'content' => 'Nội dung'
            
        ];
    }
}
