<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddSlideRequest;
use App\Model\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SlideController extends Controller
{
    public function __construct(Slide $slide)
    {
        $this->Slide = $slide;
    }
    //index
    public function index() {
        $arSlide = $this->Slide->getIndex();
        return view('shop.admin.slide.index',compact('arSlide'));
    }
    //add
    public function add() {
        return view('shop.admin.slide.add');
    }
    //post add
    public function postAdd(AddSlideRequest $request) {
        $img = '';
        if($request->hasFile('img')) {
            $filePath = $request->file('img')->store('slides');
            $arFile = explode("/",$filePath);
            $img = end($arFile);
        }
        $arSlide= [
            'title'        => $request->title,
            'preview'      => $request->preview,
            'img'          => $img
        ];
        $result = $this->Slide->add($arSlide);
        if ($result) {
            $request->session()->flash('msg','Thêm thành công');
            return redirect()->route('admin.slide.index');
        }else {
            $request->session()->flash('error','Có lỗi xảy ra');
            return redirect()->route('admin.slide.index');
        }
    }
    //del
    public function del($id,$page,Request $request) {
        $result = $this->Slide->del($id);
        $request->session()->flash('msg','Xóa thành công');
        return redirect()->route('admin.slide.index','page='.$page);
    }
    //edit
    public function edit($id,$page,Request $request) {
        $edit = $this->Slide->getId($id);
        return view('shop.admin.slide.edit',compact('edit','page'));
    }
    public function postEdit($id,$page,Request $request) {
        $object = $this->Slide->getId($id);
        $img = $object->img;
        if($request->hasFile('img')) {
            $filePath = $request->file('img')->store('slides');
            $arFile = explode("/",$filePath);
            $img = end($arFile);
        }
        $arEdit = [
            'title'      => $request->title,
            'preview'    => $request->preview,
            'img'        => $img
        ];
        $result = $this->Slide->edit($id,$arEdit);
        if ($result) {
            $request->session()->flash('msg','Sửa thành công');
            return redirect()->route('admin.slide.index','page='.$page);
        }else {
            $request->session()->flash('error','Có lỗi xảy ra');
            return redirect()->route('admin.slide.index');
        }
    }
}
