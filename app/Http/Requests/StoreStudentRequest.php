<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'gender' => 'required',
            'no' => 'required|unique:students',
            'name' => 'required',
            //'upload_img' => 'required|file|image'
        ];
    }
    public function messages(){
        return [
            'required' => ':attribute 必填',
            'unique' => ':attribute 已存在',
            //'image' => '請上傳圖片',
        ];
    }
}
