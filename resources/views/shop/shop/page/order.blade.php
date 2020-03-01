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
            @if(!empty($arTransaction))
                <div class="table-responsive">
                <table class="table table-striped table-bordered first">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tổng tiền</th>
                            <th>Hình thức thanh toán</th>
                            <th>Tình trạng</th>
                            <th>Chi tiết</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $stt=0 @endphp
                        @foreach($arTransaction as $value)
                            @php $stt++; @endphp
                            <tr>
                                <td>{{$stt}}</td>
                                <td>{{$value->amount}}</td>
                                <td>{{$value->pay}}</td>
                                <td>
                                    @if($value->status==1)
                                        Đã Xử Lý
                                    @else
                                        Chờ Xét Duyệt
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('shop.shop.myOrderDetail',$value->id_transaction)}}" class="btn btn-info">Chi tiết</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
                Bạn chưa mua hàng
            @endif
        </div>
    </div>
@endsection