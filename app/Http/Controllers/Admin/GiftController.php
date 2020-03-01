<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddGiftCode;
use App\Model\GiftCode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GiftController extends Controller
{
    public function __construct(GiftCode $giftCode)
    {
        $this->GiftCode = $giftCode;
    }

    //index
    public function index() {
        $arGift = $this->GiftCode->getIndex();
        return view('shop.admin.gift.index',compact('arGift'));
    }
    //add
    public function add() {
        $now = Carbon::now();
        return view('shop.admin.gift.add',compact('now'));
    }
    //post add
    public function postAdd(AddGiftCode $request) {
        $arGift = [
            'namegift' => $request->addgift,
            'qty'      => $request->qtygift,
            'value'    => $request->gift,
            'date_start' => date( "y-m-d h:i:s", strtotime($request->datestart)),
            'deadline'  => date( "20y-m-d h:i:s", strtotime($request->deadline))
        ];
        $result = $this->GiftCode->add($arGift);
        if ($result) {
            $request->session()->flash('msg','Thêm thành công');
            return redirect()->route('admin.gift.index');
        }else {
            $request->session()->flash('error','Có lỗi xảy ra');
            return redirect()->route('admin.gift.index');
        }
    }
    //del
    public function del($id,$page,Request $request) {
        $result = $this->GiftCode->del($id);
        $request->session()->flash('msg','Xóa thành công');
        return redirect()->route('admin.gift.index','page='.$page);
    }
    //edit
    public function edit($id,$page,Request $request) {
        $edit = $this->GiftCode->getId($id);
        return view('shop.admin.gift.edit',compact('edit','page'));
    }
    public function postEdit($id,$page,Request $request) {
        $arEdit = [
            'namegift'  => $request->editgift,
            'qty'       => $request->editqty,
            'value'     => $request->gift,
            'date_start' => date( "20y-m-d h:i:s", strtotime($request->datestart)),
            'deadline'  => date( "20y-m-d h:i:s", strtotime($request->deadline))
        ];
        $result = $this->GiftCode->edit($id,$arEdit);
        if ($result) {
            $request->session()->flash('msg','Sửa thành công');
            return redirect()->route('admin.gift.index','page='.$page);
        }else {
            $request->session()->flash('error','Có lỗi xảy ra');
            return redirect()->route('admin.gift.index');
        }
    }
}
