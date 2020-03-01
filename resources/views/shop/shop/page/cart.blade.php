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
									<li><a href="categories.html">Categories</a></li>
									<li>Shopping Cart</li>
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
	@if(count(Cart::content())>0)
			<div class="container">
				<div class="row">
					<div class="col">
						<!-- Column Titles -->
						<div class="cart_info_columns clearfix">
							<div class="cart_info_col cart_info_col_product">Sản phẩm</div>
							<div class="cart_info_col cart_info_col_price">Giá</div>
							<div class="cart_info_col cart_info_col_quantity">Số lượng</div>
							<div class="cart_info_col cart_info_col_total">Thành tiền</div>
						</div>
					</div>
				</div>
				<div class="row cart_items_row">
					<div class="col">
						<!-- Cart Item -->
						<form action="" method="post">
							@csrf
						@foreach(Cart::content() as $cart)
							<div class="cart_item d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
								<!-- Name -->
								<div class="cart_item_product d-flex flex-row align-items-center justify-content-start">
									<div class="cart_item_image">
										<div><img src="/storage/app/files/{{$cart->options->picture}}" style="width: 180px;height: 215px;"></div>
									</div>
									<div class="cart_item_name_container">
										<div class="cart_item_name"><a href="#">{{$cart->name}}</a></div>
										<div class="cart_item_edit"><a href="#">{{$cart->options->namecat}}</a></div>
									</div>
								</div>
								<!-- Price -->
								<div class="cart_item_price">{{number_format($cart->price)}} đ</div>
								<!-- Quantity -->
								<div class="cart_item_quantity">
									<div class="product_quantity_container">
										<div class="product_quantity ">
											<span>SL</span>
											<input id="" type="number"  class="qty" name="qty" value="{{$cart->qty}}">
											<div class="quantity_buttons">
											</div>
										</div>
									</div>
								</div>
								<!-- Total -->
								<div  class="cart_item_total"><div id="rowid{{$cart->rowId}}">{{number_format($cart->subtotal)}} đ</div></div>
								<div style="padding-left: 10px"><a class="fa fa-trash" style="color: #6c6a74;" href="{{route('shop.shop.delCart',$cart->rowId)}}"></a></div>
								<div style="padding-left: 10px" class="update" id="{{$cart->rowId}}"><a class="fa fa-refresh"  style="color: #6c6a74;"></a></div>
							</div>
						@endforeach
						</form>
					</div>
				</div>
				<div class="row row_cart_buttons">
					<div class="col">
						<div class="cart_buttons d-flex flex-lg-row flex-column align-items-start justify-content-start">
							<div class="button continue_shopping_button"><a href="{{route('shop.shop.index')}}">Tiếp tục mua hàng</a></div>
							<div class="cart_buttons_right ml-lg-auto">
								<div class="button clear_cart_button"><a href="{{route('shop.shop.dellAllCart')}}">Xóa tất cả</a></div>
							</div>
						</div>
					</div>
				</div>
				<div class="row row_extra">
					<div class="col-lg-4">

					</div>
					<div class="col-lg-6 offset-lg-2">
						<div class="cart_total">
							<div class="section_title">Thanh toán</div>
							<div class="section_subtitle"></div>
							<div class="cart_total_container">
								<ul>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_total_title">Tổng tiền sản phẩm</div>
										<div class="cart_total_value ml-auto" id="subtotal">{{number_format(str_replace(',','',Cart::subtotal(0,3)))}} đ</div>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_total_title">Thuế VAT</div>
										<div class="cart_total_value ml-auto" id="tax">{{number_format(str_replace(',','',Cart::tax(0,3)))}} đ</div>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_total_title">Tổng phải trả</div>
										<div class="cart_total_value ml-auto" id="total">{{number_format(str_replace(',','',Cart::total(0,3)))}} đ</div>
									</li>
								</ul>
							</div>
							<div class="button checkout_button"><a href="{{route('shop.shop.checkout')}}">Thanh Toán</a></div>
						</div>
					</div>
				</div>
			</div>
	@else
		<div class="container">
			<h4 style="padding-bottom: 20px">Không có sản phẩm nào trong giỏ hàng</h4>
			<div class="button continue_shopping_button"><a href="{{route('shop.shop.index')}}">Tiếp tục mua hàng</a></div>
		</div>
	@endif
</div>
@endsection
@section('ajax')
	<script type="text/javascript" src="/public/templates/shop/js/updateqty.js"></script>
@endsection