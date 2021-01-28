<?php

namespace App\Http\Requests;

use App\Rules\UniqueStudentNo;
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
            'no' => ['required',new UniqueStudentNo],
            'name' => 'required',
            //'upload_img' => 'required|file|image'
        ];
     
    }
    public function messages(){
        return [
            'no.required' => '編號必填',
            'no.unique' => '編號已存在',
            'gender.required' => '性別為必填',
            'name.required' => '姓名必填',
            //'image' => '請上傳圖片',
        ];
    }
}
