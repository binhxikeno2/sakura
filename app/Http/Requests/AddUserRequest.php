<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
            'username' => 'required|min:6',
            'fullname' => 'required|min:6',
            'email'    => 'required|email',
            'password' => 'required',
            'phone'    => 'required',
            'level'    => 'required',
        ];
    }
    public function messages()
    {
        return [
            'username.required'     => 'Vui lòng nhập username',
            'username.min'          => 'Tối thiểu nhập 6 ký tự trở lên',
            'fullname.required'     => 'Vui lòng nhập fullname',
            'fullname.min'          => 'Tối thiểu nhập 6 ký tự trở lên',
            'email.required'        => 'Vui lòng nhập email',
            'email.email'           => 'Vui lòng đúng định dạng email',
            'password.required'     => 'Vui lòng nhập password',
            'phone.required'        => 'Vui lòng nhập sđt',
            'level.required'        => 'Vui lòng chọn cấp độ',
        ];
    }
}
