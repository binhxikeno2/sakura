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
                                        <li>Lịch Sử Đổi Thưởng</li>
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
            @if(!empty($arReward))
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            <th>Ngày</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $stt=0 @endphp
                        @foreach($arReward as $value)
                            @php $stt++; @endphp
                            <tr>
                                <td>{{$stt}}</td>
                                <td>{{$value->nameproduct}}</td>
                                <td>{{$value->qty}}</td>
                                <td>{{number_format($value->amount)}} VND</td>
                                <td>
                                   {{( date("(h:m:s) m/d/Y", strtotime($value->created_at)))}}
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