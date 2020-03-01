<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddPointRequest;
use App\Model\Customer_Type;
use App\Model\Point;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PointController extends Controller
{
    public function __construct(Customer_Type $customer_Type,Point $point)
    {
        $this->Customer_Type = $customer_Type;
        $this->Point   = $point;
    }

    public function index() {
        $arCustomer = $this->Customer_Type->getAll();
        $point = $this->Point->getPoint();
        return view('shop.admin.point.index',compact('arCustomer','point'));
    }
    public function del($id,Request $request) {
        $result = $this->Customer_Type->del($id);
        $request->session()->flash('msg','Xóa thành công');
        return redirect()->route('admin.point.index');
    }
    public function add() {
        return view('shop.admin.point.add');
    }
    public function postAdd(AddPointRequest $request) {
        $arAdd = [
            'customer' => $request->danhhieu,
            'customer_point' => $request->dieukien,
            'discount'  => $request->giamgia
        ];
        $result = $this->Customer_Type->add($arAdd);
        if ($result) {
            $request->session()->flash('msg','Thêm thành công');
            return redirect()->route('admin.point.index');
        }else {
            $request->session()->flash('error','Có lỗi xảy ra');
            return redirect()->route('admin.point.index');
        }
    }
    public function edit($id) {
        $object = $this->Customer_Type->getId($id);
        return view('shop.admin.point.edit',compact('object'));
    }
    public function postEdit(Request $request,$id) {
        $arEdit = [
            'customer' => $request->danhhieu,
            'customer_point' => $request->dieukien,
            'discount'  => $request->giamgia
        ];
        $result = $this->Customer_Type->edit($arEdit,$id);
        if ($result) {
            $request->session()->flash('msg','Sửa thành công');
            return redirect()->route('admin.point.index');
        }else {
            $request->session()->flash('error','Có lỗi xảy ra');
            return redirect()->route('admin.point.index');
        }
    }
    public function editPoint(Request $request,$id) {
        $point = [
            'point' => $request->point
        ];
        $result = $this->Point->edit($id,$point);
        $request->session()->flash('msg','Sửa thành công');
        return redirect()->route('admin.point.index');
    }
}
