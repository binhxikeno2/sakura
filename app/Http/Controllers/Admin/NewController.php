<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddNewRequest;
use App\Model\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewController extends Controller
{
    public function __construct(News $news)
    {
        $this->News = $news;
    }
    //index
    public function index() {
        $arNew = $this->News->getIndex();
        return view('shop.admin.new.index',compact('arNew'));
    }
    //add
    public function add() {
        return view('shop.admin.new.add');
    }
    //post add
    public function postAdd(AddNewRequest $request) {
        $img = '';
        if($request->hasFile('picture_news')) {
            $filePath = $request->file('picture_news')->store('news');
            $arFile = explode("/",$filePath);
            $img = end($arFile);
        }
        $arNew= [
            'news'        => $request->news,
            'preview'      => $request->preview,
            'detail'       => $request->detail,
            'picture_news'          => $img
        ];
        $result = $this->News->add($arNew);
        if ($result) {
            $request->session()->flash('msg','Thêm thành công');
            return redirect()->route('admin.new.index');
        }else {
            $request->session()->flash('error','Có lỗi xảy ra');
            return redirect()->route('admin.new.index');
        }
    }
    //del
    public function del($id,$page,Request $request) {
        $result = $this->News->del($id);
        $request->session()->flash('msg','Xóa thành công');
        return redirect()->route('admin.new.index','page='.$page);
    }
    //edit
    public function edit($id,$page,Request $request) {
        $edit = $this->News->getId($id);
        return view('shop.admin.new.edit',compact('edit','page'));
    }
    public function postEdit($id,$page,Request $request) {
        $object = $this->News->getId($id);
        $img = $object->picture_news;
        if($request->hasFile('picture_news')) {
            $filePath = $request->file('picture_news')->store('news');
            $arFile = explode("/",$filePath);
            $img = end($arFile);
        }
        $arEdit = [
            'news'        => $request->news,
            'preview'      => $request->preview,
            'detail'       => $request->detail,
            'picture_news'          => $img
        ];
        $result = $this->News->edit($id,$arEdit);
        if ($result) {
            $request->session()->flash('msg','Sửa thành công');
            return redirect()->route('admin.new.index','page='.$page);
        }else {
            $request->session()->flash('error','Có lỗi xảy ra');
            return redirect()->route('admin.new.index');
        }
    }
}
