<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\LoginUserRequest;
use App\Model\Customer_Type;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(User $user,Customer_Type $customer_Type)
    {
        $this->User = $user;
        $this->Customer_Type = $customer_Type;
    }

    public function login() {
        return view('shop.auth.login');
    }
    public function postLogin(Request $request) {
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('admin.admin.index'));
        }else {
            return redirect()
                ->route('shop.auth.login')
                ->with('msg','Đăng nhập không thành công');
        }
    }
    public function logout () {
        Auth::logout();
        return redirect()->route('shop.auth.login');
    }
    //login user
    public function loginUser() {
        return view('shop.auth.user');
    }
    public function postLoginUser(LoginUserRequest $request) {
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user()->accumulated;
            $customer = $this->Customer_Type->getAll();
            foreach ($customer as $value) {
                if ($user >= $value->customer_point){
                    $this->User->customer(Auth::user()->id,$value->id_customer);
                }
            }
            echo '<script>alert("Xin chào '.Auth::user()->fullname.'");window.location = "/"</script>';
        }else {
            return redirect()
                ->route('shop.auth.loginUser')
                ->with('error','Đăng nhập không thành công');
        }
    }
    //logout user
    public function logoutUser($id) {
        Auth::logout($id);
        return redirect()->route('shop.shop.index');
    }
}
