<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddGiftCode extends FormRequest
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
            'addgift'  => 'required',
            'qtygift'  => 'required',
            'gift'     => 'required',
            'deadline' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'addgift.required'  => 'Vui lòng nhập tên mã',
            'qtygift.required'  => 'Vui lòng nhập số lượng',
            'gift.required'     => 'Vui lòng chọn giá trị',
            'deadline.required' => 'Vui lòng nhập ngày kết thúc'
        ];
    }
}
