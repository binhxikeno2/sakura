<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            'nameproduct'  => 'required',
            'idcat'        => 'required',
            'hinhanh'      => 'required',
            'qty'          => 'required',
            'price'        => 'required',
            'description'  => 'required|min:6',
            'detail'       => 'required|min:20',
            'type'         => 'required'
        ];
    }
    public function messages()
    {
        return [
            'nameproduct.required'  => 'Vui lòng nhập tên sản phẩm',
            'idcat.required'        => 'Vui lòng chọn danh mục',
            'hinhanh.required'      => 'Vui lòng chọn hình ảnh',
            'qty.required'          => 'Vui lòng nhập số lượng',
            'price.required'        => 'Vui lòng nhập giá sản phẩm',
            'description.required'  => 'Vui lòng nhập mô tả',
            'description.min'       => 'Tối thiểu 6 ký tự trở lên',
            'detail.required'       => 'Vui lòng nhập thông tin chi tiết,',
            'detail.min'            => 'Tối thiểu 20 ký tự trở lên',
            'type.required'         => 'Vui lòng chọn loại sản phẩm'
        ];
    }
}
