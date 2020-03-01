@extends('templates.shop.master')
<link rel="stylesheet" type="text/css" href="/public/templates/shop/styles/checkout.css">
<link rel="stylesheet" type="text/css" href="/public/templates/shop/styles/checkout_responsive.css">
<script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>
@section('title') CheckOut @endsection
@section('content')
	<div class="home">
	<div class="home_container">
		<div class="home_background" style="background-image:url(/public/templates/shop/images/cart.jpg)"></div>
		<div class="home_content_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content">
							<div class="breadcrumbs">
								<ul>
									<li><a href="index.html">Home</a></li>
									<li><a href="cart.html">Shopping Cart</a></li>
									<li>Checkout</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	<div class="checkout">
	<div class="container">
		<form action="{{route('shop.shop.postCheckOut')}}" method="post">
			@csrf
			<div class="row">
				<!-- Billing Info -->
				<div class="col-lg-6">
					<div class="billing checkout_section">
						<div class="section_title">Địa chỉ nhận hàng</div>
						<div id="result" class="checkout_form_container">
							<form action="#" id="checkout_form" class="checkout_form">
								<div>
									<!-- Company -->
									<p><span class="fa fa-address-book-o"></span> {{Auth::user()->fullname}}</p>
									<p><span class="fa fa-address-card"></span> {{Auth::user()->address}}</p>
									<p><span class="fa fa-phone"></span> {{Auth::user()->phone}}</p>
									<p><span class="fa fa-envelope"></span> {{Auth::user()->email}}</p>
									<a href="" style="margin: 20px auto;background-color:#DADADA" class="btn btn-primary" data-toggle="modal" data-target="#modalLoginForm">Thay đổi</a>
								</div>
							</form>
						</div>
					</div>
				</div>

				<!-- Order Info -->

				<div class="col-lg-6">
					<br class="order checkout_section">
						<div class="section_title">Đơn hàng của bạn</div>
						<div class="section_subtitle">Chi tiết đặt hàng</div>

						<!-- Order details -->
						<div class="order_list_container">
							<ul class="order_list">
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="order_list_title">Số sản phẩm</div>
									<div class="order_list_value ml-auto">{{Cart::count()}} sản phẩm</div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="order_list_title">Tổng tiền</div>
									<div class="order_list_value ml-auto">{{number_format(str_replace(',','',Cart::subtotal(0,3)))}} đ</div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="order_list_title">Thuế VAT</div>
									<div class="order_list_value ml-auto">{{number_format(str_replace(',','',Cart::tax(0,3)))}} đ</div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="order_list_title">Khuyến Mãi</div>
									<div class="order_list_value ml-auto">
										@if(!empty(Auth::user()->id_customer))
											@php
												$tien = str_replace(',','',Cart::total(0,3))-str_replace(',','',Cart::total(0,3))/100*$discount->discount;
											@endphp
											{{$discount->discount}} %
										@else
											@php $tien=0 @endphp
											0%
										@endif
									</div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="order_list_title">Thành tiền</div>
									<div class="order_list_value ml-auto">@if(empty($tien)) {{number_format(str_replace(',','',Cart::total(0,3)))}}@else <strike>{{number_format(str_replace(',','',Cart::total(0,3)))}}</strike> {{number_format($tien)}} @endif đ</div>
								</li>
							</ul>
						</div>
						<div class="payment">
							<div class="payment_options">
							@foreach($pay as $value)
								<label class="payment_option clearfix">{{$value->pay}}
									<input type="radio" name="pay" value="{{$value->id_pay}}">
									<span class="checkmark"></span>
								</label>
							@endforeach
								<span class="alert-danger">{{$errors->first('pay')}}</span>
							</div>
						</div>
						<div class="order_text">Kiểm tra lại đơn hàng trước khi thanh toán.</div>
						<input type="submit" name="" class="button order_button" value="Xác Nhận">
					</div>
				</div>
			</div>
		</form>
		<div class="button order_button"><a href="{{route('shop.shop.cart')}}">Quay lại giỏ hàng</a></div>
	</div>
</div></html>
	<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
		 aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form action="" method="post">
					@csrf
					<div class="modal-header text-center">
						<h4 class="modal-title w-100 font-weight-bold">Thông tin giao hàng</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body mx-3">
						<div class="">
							<label data-error="wrong" data-success="right" for="defaultForm-email">Người nhận</label>
							<input type="text" id="defaultForm-email" class="fullname form-control	" value="{{Auth::user()->fullname}}">
						</div><br/>
						<div class="">
							<label data-error="wrong" data-success="right" for="defaultForm-email">Địa chỉ nhận hàng</label>
							<input type="text" id="defaultForm-email" class="address form-control" value="{{Auth::user()->address}}">
						</div><br/>
						<div class="">
							<label data-error="wrong" data-success="right" for="defaultForm-email">Email</label>
							<input type="text" id="defaultForm-email" class="email form-control" value="{{Auth::user()->email}}">
						</div><br/>
						<div class="md-form mb-5">
							<label data-error="wrong" data-success="right" for="defaultForm-email">Số điện thoại</label>
							<input type="text"  id="defaultForm-email" class="phone form-control" value="{{Auth::user()->phone}}">
						</div>
					</div>
					<div class="modal-footer d-flex justify-content-center">
						<a href="javascript:void(0)" class="updateinfo btn btn-default" data-dismiss="modal" aria-label="Close">Thay đổi</a>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection
@section('ajax')
	<script src="/public/templates/shop/js/giftcode.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.updateinfo').click(function () {
				var fullname = $(this).parent().parent().find('.fullname').val();
				var address = $(this).parent().parent().find('.address').val();
				var email = $(this).parent().parent().find('.email').val();
				var phone = $(this).parent().parent().find('.phone').val();
				var id = '{{Auth::user()->id}}';
				var token = $("input[name='_token']").val();
				$.ajax({
					url: '/updateInfo',
					type: 'POST',
					cache:false,
					data:{
						"_token":token,
						"id":id,
						"fullname":fullname,
						"address":address,
						"email":email,
						"phone":phone
					},
					success: function (data) {
						$('#result').html(data);
					}
				});
			});
		});
	</script>
@endsection