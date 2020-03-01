<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddUserRequest;
use App\Model\Level;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct(User $user,Level $level)
    {
        $this->User  = $user;
        $this->Level = $level;
    }

    //index
    public function index() {
        $arUsers = $this->User->getUsers();
        return view('shop.admin.users.index',compact('arUsers'));
    }
    //add
    public function add() {
        $getLevel = $this->Level->getAll();
        return view('shop.admin.users.add',compact('getLevel'));
    }
    //post add
    public function postAdd(AddUserRequest $request) {
        $arAdd = [
            'username' => $request->username,
            'password' => password_hash($request->password,PASSWORD_DEFAULT),
            'fullname' => $request->fullname,
            'email'    => $request->email,
            'address'  => $request->address,
            'phone'    => $request->phone,
            'id_level' => $request->level
        ];
        $result = $this->User->add($arAdd);
        if ($result) {
            $request->session()->flash('msg','Thêm thành công');
            return redirect()->route('admin.users.index');
        }else {
            $request->session()->flash('error','Có lỗi xảy ra');
            return redirect()->route('admin.users.index');
        }
    }
    //del
    public function del($id,Request $request) {
        $objectItem = $this->User->getId($id);
        if ($objectItem->username ='admin'){
            $request->session()->flash('msg','Bạn không thể xóa admin');
            return redirect()->route('admin.users.index');
            exit();
        }
        $del = $this->User->del($id);
        $request->session()->flash('msg','Xóa thành công');
        return redirect()->route('admin.users.index');
    }
    //edit
    public function edit($id,Request $request) {
        $getLevel = $this->Level->getAll();
        $objectItem  = $this->User->getId($id);
        if (Auth::user()->username != $objectItem->username && Auth::user()->username != 'admin') {
            $request->session()->flash('msg','Bạn không thể sửa thông tin người khác');
            return redirect()->route('admin.users.index');
            exit();
        }
        return view('shop.admin.users.edit',compact('getLevel','objectItem'));
    }
    //post edit
    public function postEdit($id,Request $request) {
        $edit = $this->User->getId($id);
        $password = $edit->password;
        if(!empty($request->password)) {
            $password = password_hash($request->password,PASSWORD_DEFAULT);
        }
        $arEdit = [
            'username' => $request->username,
            'password' => $password,
            'fullname' => $request->fullname,
            'email'    => $request->email,
            'address'  => $request->address,
            'phone'    => $request->phone,
            'id_level' => $request->level
        ];
        $result = $this->User->edit($id,$arEdit);
        if ($result) {
            $request->session()->flash('msg','Sửa thành công');
            return redirect()->route('admin.users.index');
        }else {
            $request->session()->flash('error','Có lỗi xảy ra');
            return redirect()->route('admin.users.index');
        }
    }
}
