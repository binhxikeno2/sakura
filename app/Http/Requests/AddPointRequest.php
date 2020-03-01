<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPointRequest extends FormRequest
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
            'danhhieu' => 'required',
            'dieukien' => 'required',
            'giamgia' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'danhhieu.required' => 'Vui lòng nhập danh hiệu',
            'dieukien.required' => 'Vui lòng nhập điều kiện',
            'giamgia.required' => 'Vui lòng nhập giảm giá'
        ];
    }
}
