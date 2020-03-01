<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddProductRequest;
use App\Model\Categories;
use App\Model\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __construct(Products $products,Categories $categories)
    {
        $this->Products   = $products;
        $this->Categories = $categories;
    }

    //index
    public function index() {
        if (Request()->ajax()) {
            $type = Request()->get('type');
            $arIndex = $this->Products->getIndex2($type);
            return view('shop.admin.products.form',compact('arIndex'));
        }else
        $arIndex = $this->Products->getIndex();
        return view('shop.admin.products.index',compact('arIndex'));
    }
    //add
    public function add() {
        $select  = $this->Categories->getAll();
        return view('shop.admin.products.add',compact('select'));
    }
    //post add
    public function postAdd(AddProductRequest $request) {
        $picture = '';
        if($request->hasFile('hinhanh')) {
            $filePath = $request->file('hinhanh')->store('files');
            $arFile = explode("/",$filePath);
            $picture = end($arFile);
        }
        //hình ảnh mô tả
        $picture_descrip = $request->hinhanhmota;
        $pictureDescrip = '';
        if ($request->hasFile('hinhanhmota')) {
            foreach ($picture_descrip as $key => $file) {
                $tenFile = $file->getClientOriginalName();
                $explode = explode(".",$tenFile);
                $end = end($explode);
                $newFile = $key.time().'.'.$end;
                $file->storeAs('files',$newFile);
                $arPicture[$key] = $newFile;
            }
            $picture_descrip = json_encode($arPicture);
        }
        //end
        $arAdd = [
            'nameproduct'      => $request->nameproduct,
            'picture'          => $picture,
            'picture_descrip'  => $picture_descrip,
            'description'      => $request->description,
            'detail_text'      => $request->detail,
            'qty'              => $request->qty,
            'price'            => $request->price,
            'sale'             => $request->sale,
            'status'           => 0,
            'id_cat'           => $request->idcat,
            'type'             => $request->type
        ];
        $result = $this->Products->addProduct($arAdd);
        if ($result) {
            $request->session()->flash('msg','Thêm thành công');
            return redirect()->route('admin.product.index');
        }else {
            $request->session()->flash('error','Có lỗi xảy ra');
            return redirect()->route('admin.product.index');
        }
    }
    //del
    public function del($id,$page,Request $request) {
        $reult = $this->Products->del($id);
        $request->session()->flash('msg','Xóa thành công');
        return redirect()->route('admin.product.index','page='.$page);
    }
    //edit
    public function edit($id,$page) {
        $getProduct = $this->Products->getId($id);
        $select     = $this->Categories->getAll();
        return view('shop.admin.products.edit',compact('select','getProduct','page'));
    }
    //post edit
    public function postEdit($id,$page,Request $request) {
        $productId = $this->Products->getId($id);
        $picture   = $productId->picture;
        //picture
        if($request->hasFile('hinhanh')) {
            $filePath = $request->file('hinhanh')->store('files');
            $arFile = explode("/",$filePath);
            $picture = end($arFile);
        }
        //picture description
        $picture_descrip = $productId->picture_descrip;
        if ($request->hasFile('hinhanhmota')) {
            foreach ($request->hinhanhmota as $key => $file) {
                $tenFile = $file->getClientOriginalName();
                $explode = explode(".",$tenFile);
                $end = end($explode);
                $newFile = $key.time().'.'.$end;
                $file->storeAs('files',$newFile);
                $arPicture[$key] = $newFile;
            }
            $picture_descrip = json_encode($arPicture);
        }
        $arEdit = [
            'nameproduct'          => $request->nameproduct,
            'picture'              => $picture,
            'picture_descrip'  => $picture_descrip,
            'description'          => $request->description,
            'detail_text'          => $request->detail,
            'qty'                  => $request->qty,
            'price'                => $request->price,
            'sale'                 => $request->editsale,
            'status'               => 0,
            'id_cat'               => $request->idcat,
            'type'                 => $request->type
        ];
        $result = $this->Products->edit($id,$arEdit);
        if ($result) {
            $request->session()->flash('msg','Sửa thành công');
            return redirect()->route('admin.product.index','page='.$page);
        }else {
            $request->session()->flash('error','Có lỗi xảy ra');
            return redirect()->route('admin.product.index');
        }
    }
    //status
    public function status($id,Request $request)
    {
        $result = $this->Products->status($id);
        $request->session()->flash('msg', 'Cập nhập thành công');
        return redirect()->route('admin.product.index');
    }

}
