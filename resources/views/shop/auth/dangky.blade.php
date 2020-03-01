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
@section('title') Đăng nhập @endsection
@section('content')
    <div class="home" style="height: 750px;">
        <div class="home_container">
            <div class="col-md-4 col-md-offset-4" id="login">
                <section id="inner-wrapper" class="login">
                    <article>
                        <form action="{{route('shop.shop.postDangKy')}}" method="post">
                            <h4 style="text-align: center;padding-bottom: 10px;font-size: 25px;font-family: Sans-Serif">Đăng ký</h4>
                            @csrf
                            <div class="form-group">
                                <div style="font-size: 14px">
                                    @if(Session::has('msg'))
                                        <div class="alert alert-primary" role="alert">
                                            {{Session::get('msg')}}
                                        </div>
                                    @elseif(Session::has('error'))
                                        <div class="alert alert-danger">
                                            {{Session::get('error')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-address-book"> </i></span>
                                    <input type="text" class="form-control" name="fullname" placeholder="Họ tên">
                                    <span class="alert-danger">{{$errors->first('fullname')}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-address-book-o"> </i></span>
                                    <input type="text" class="form-control" name="username" placeholder="Tên đăng nhập">
                                    <span class="alert-danger">{{$errors->first('username')}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-key"> </i></span>
                                    <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
                                    <span class="alert-danger">{{$errors->first('username')}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"> </i></span>
                                    <input type="text" class="form-control" name="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone-square"> </i></span>
                                    <input type="text" class="form-control" name="phone" placeholder="Số điện thoại">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-address-card"> </i></span>
                                    <input type="text" class="form-control" name="address" placeholder="Địa chỉ nhận hàng">
                                </div>
                            </div>
                            <button type="submit" style="margin-top: 10px" class="btn btn-success btn-block">Đăng ký</button>
                        </form>
                    </article>
                </section></div>
        </div>
    </div>

@endsection
