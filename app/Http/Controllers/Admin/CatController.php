<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddCatRequest;
use App\Model\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CatController extends Controller
{
    public function __construct(Categories $categories)
    {
        $this->Categories = $categories;
    }

    //index
    public function index() {
        $arIndex  = $this->Categories->getIndex();
        return view('shop.admin.category.index',compact('arIndex'));
    }
    //add
    public function add() {
        $arAdd    = $this->Categories->arSelect();
        return view('shop.admin.category.add',compact('arAdd'));
    }
    //post add
    public function postAdd(AddCatRequest $request) {
        $arAdd = [
            'namecat' => $request->addcat,
            'status'  => 0,
            'id_sub'  => $request->idsub
        ];
        $result = $this->Categories->addCat($arAdd);
        if ($result) {
            $request->session()->flash('msg','Thêm thành công');
            return redirect()->route('admin.cat.index');
        }else {
            $request->session()->flash('error','Có lỗi xảy ra');
            return redirect()->route('admin.cat.index');
        }
    }
    //edit
    public function edit($id) {
        $objectItem  = $this->Categories->getId($id);
        $arSelect    = $this->Categories->getCat();
        return view('shop.admin.category.edit',compact('objectItem','arSelect'));
    }
    public function postEdit($id,Request $request) {
        $arEdit = [
            'namecat'  => $request->editnamecat,
            'id_sub'   => $request->editcat
        ];
        $result = $this->Categories->edit($id,$arEdit);
        if ($result) {
            $request->session()->flash('msg','Sửa thành công');
            return redirect()->route('admin.cat.index');
        }else {
            $request->session()->flash('error','Có lỗi xảy ra');
            return redirect()->route('admin.cat.index');
        }
    }
    //del
    public function del($id,Request $request) {
        $result = $this->Categories->del($id);
        $request->session()->flash('msg','Xóa thành công');
        return redirect()->route('admin.cat.index');
    }
    public function status($id,Request $request) {
        $result = $this->Categories->status($id);
        $request->session()->flash('msg','Cập nhập thành công');
        return redirect()->route('admin.cat.index');
    }
}
