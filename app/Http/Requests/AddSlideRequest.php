<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddSlideRequest extends FormRequest
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
            'title'  => 'required',
            'preview'  => 'required',
            'img'     => 'required'
        ];
    }
    public function messages()
    {
        return [
            'title.required'  => 'Vui lòng tiêu đề',
            'preview.required'  => 'Vui lòng nhập mô tả',
            'img.required'     => 'Vui chọn hình ảnh'
        ];
    }

}
