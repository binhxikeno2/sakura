<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DangKyRequest extends FormRequest
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
            'username' =>  'required',
            'password' =>  'required',
            'fullname' =>  'required',
            'email'    =>  'required|email',
            'address'  =>  'required',
            'phone'    =>  'required'
        ];
    }
    public function messages()
    {
        return [
            'username.required' =>  'Vui lòng nhập username',
            'password.required' =>  'Vui lòng nhập password',
            'fullname.required' =>  'Vui lòng nhập họ tên',
            'email.required'    =>  'Vui lòng nhập email',
            'email.email'        =>  'Vui lòng nhập đúng định dạng email',
            'address.required'  =>  'Vui lòng nhập email',
            'phone.required'    =>  'Vui lòng số điện thoại'
        ];
    }
}
