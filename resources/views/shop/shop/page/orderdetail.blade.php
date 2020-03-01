@extends('templates.shop.master')
<link rel="stylesheet" type="text/css" href="/public/templates/shop/styles/cart.css">
<link rel="stylesheet" type="text/css" href="/public/templates/shop/styles/cart_responsive.css">
@section('title') Giỏ hàng @endsection
@section('content')
    <div class="home">
        @if(Session::has('msg'))
            <div class="alert alert-primary" role="alert">
                {{Session::get('msg')}}
            </div>
        @elseif(Session::has('error'))
            <div class="alert alert-danger">
                {{Session::get('error')}}
            </div>
        @endif
        <div class="home_container">
            <div class="home_background" style="background-image:url(/public/templates/shop/images/slideshow_2.jpg)"></div>
            <div class="home_content_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_content">
                                <div class="breadcrumbs">
                                    <ul>
                                        <li><a href="index.html">Home</a></li>
                                        <li><a href="categories.html">Shopping</a></li>
                                        <li>Đơn hàng của bạn</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cart_info">
        <div class="container">
            <div class="table-responsive">
                <table class="table table-striped table-bordered first">
                    <thead>
                    <tr>
                        <th>Họ tên</th>
                        <td>{{$Transaction->fullname}}</td>
                    </tr>
                    <tr>
                        <th>Địa chỉ</th>
                        <td>{{$Transaction->address}}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>{{$Transaction->phone}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{$Transaction->email}}</td>
                    </tr>
                </table>
            </div></br>
            <div class="table-responsive">
                <table class="table table-striped table-bordered first">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($arOrderDt as $value)
                        <tr>
                            <td>1</td>
                            <td>{{$value->nameproduct}}</td>
                            <td>
                               {{$value->qty}}
                            </td>
                            <td>
                               {{$value->total}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection