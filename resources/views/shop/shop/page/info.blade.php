@extends('templates.shop.master')
<link rel="stylesheet" type="text/css" href="/public/templates/shop/styles/checkout.css">
<link rel="stylesheet" type="text/css" href="/public/templates/shop/styles/checkout_responsive.css">
<style>
    body {
        background:#333;
    }
    #login {
        -webkit-perspective: 1000px;
        -moz-perspective: 1000px;
        perspective: 1000px;
        margin-top:50px;
        margin-left:30%;
    }
    .login {
        font-family: 'Josefin Sans', sans-serif;
        -webkit-transition: .3s;
        -moz-transition: .3s;
        transition: .3s;
        -webkit-transform: rotateY(40deg);
        -moz-transform: rotateY(40deg);
        transform: rotateY(40deg);
    }
    .login:hover {
        -webkit-transform: rotate(0);
        -moz-transform: rotate(0);
        transform: rotate(0);
    }
    .login article {

    }
    .login .form-group {
        margin-bottom:17px;
    }
    .login .form-control,
    .login .btn {
        border-radius:0;
    }
    .login .btn {
        text-transform:uppercase;
        letter-spacing:3px;
    }
    .input-group-addon {
        border-radius:0;
        color:#fff;
        background:#f3aa0c;
        border:#f3aa0c;
    }
    .forgot {
        font-size:16px;
    }
    .forgot a {
        color:#333;
    }
    .forgot a:hover {
        color:#5cb85c;
    }

    #inner-wrapper, #contact-us .contact-form, #contact-us .our-address {
        color: #1d1d1d;
        font-size: 19px;
        line-height: 1.7em;
        font-weight: 300;
        padding: 50px;
        background: #fff;
        box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
        margin-bottom: 100px;
    }
    .input-group-addon {
        border-radius: 0;
        border-top-right-radius: 0px;
        border-bottom-right-radius: 0px;
        color: #fff;
        background: #f3aa0c;
        border: #f3aa0c;
        border-right-color: rgb(243, 170, 12);
        border-right-style: none;
        border-right-width: medium;
    }
</style>
@section('title') Thông tin các nhân @endsection
@section('content')
    <div class="home" style="background: #f0f0f8;height: 700px">
        <div class="home_container">
            <div class="" id="login" style="margin: 20px auto ;width: 800px;background:#ffffff;padding: 20px">
                <div style="border-bottom: 1px solid #f5f5f5;padding-bottom: 20px">
                    @if(Session::has('msg'))
                        <div class="alert alert-primary" role="alert">
                            {{Session::get('msg')}}
                        </div>
                    @elseif(Session::has('error'))
                        <div class="alert alert-danger">
                            {{Session::get('error')}}
                        </div>
                    @endif
                    <h4>Hồ Sơ Của Tôi</h4>
                        <p><strong>Danh hiệu:</strong>
                            @if(!empty(Auth::user()->id_customer))
                                {{$user->customer}}
                            @else
                                Chưa có
                            @endif
                        </p>
                    <p><strong>Tiền thưởng</strong>: {{number_format(Auth::user()->rewardpoint)}} đ </p>
                        <p>Đến trang <a href="{{route('shop.shop.exchange')}}" style="border-bottom: none">đổi thưởng <span class="fa fa-arrow-circle-o-right"></span></a></p>
                    <p><a href="{{route('shop.shop.myReward',Auth::user()->id)}}" style="border-bottom: none">Lịch sử đổi thưởng <span class="fa fa-arrow-circle-o-right"></span></a></p>
                </div>
                <form action="{{route('shop.shop.postInfo',Auth::user()->id)}}" method="post" style="padding-top: 20px;">
                    @csrf
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Tên đăng nhập</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword" name="username" value="{{Auth::user()->username}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Họ tên</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword" name="fullname" value="{{Auth::user()->fullname}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword" name="email" value="{{Auth::user()->email}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Mật khẩu mới</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" id="inputPassword">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label" >Số điện thoại</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword" name="phone" value="{{Auth::user()->phone}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Địa chỉ nhận hàng</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword" name="address" value="{{Auth::user()->address}}">
                        </div>
                    </div>
                    <div style="text-align: center">
                        <input type="submit" class="btn btn-primary" value="Cập Nhập">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
