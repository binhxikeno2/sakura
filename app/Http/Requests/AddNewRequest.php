<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddNewRequest extends FormRequest
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
            'news'  => 'required',
            'preview'  => 'required',
            'detail'     => 'required'
        ];
    }
    public function messages()
    {
        return [
            'news.required'  => 'Vui lòng tiêu đề tin',
            'preview.required'  => 'Vui lòng nhập mô tả',
            'detail.required'     => 'Vui lòng nhập chi tiết'
        ];
    }
}
