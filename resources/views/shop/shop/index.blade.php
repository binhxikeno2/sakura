@extends('templates.shop.master')
@section('title') Trang Chủ @endsection
<link rel="stylesheet" type="text/css" href="/public/templates/shop/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="/public/templates/shop/styles/responsive.css">
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
@section('content')
	<!-- Home -->
	<div class="home">
		<div class="home_slider_container">
			<!-- Home Slider -->
			<div style="position:absolute;top: 500px;left:200px;width: 100px;height: 50px;background-color: red;"></div>
			<div class="owl-carousel owl-theme home_slider">
				<!-- Slider Item -->
				@if(!empty($slide))
					@foreach($slide as $value)
						<div class="owl-item home_slider_item">
					<div class="home_slider_background" style="background-image:url(/storage/app/slides/{{$value->img}})"></div>
					<div class="home_slider_content_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
										<div class="home_slider_title">{{$value->title}}</div>
										<div class="home_slider_subtitle">{{$value->preview}}</div>
										<div class="button button_light home_button"><a href="">Chi tiết</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
					@endforeach
				@endif
				<!-- Slider Item -->
			</div>
			<!-- Home Slider Dots -->
			<div class="home_slider_dots_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_slider_dots">
								<ul id="home_slider_custom_dots" class="home_slider_custom_dots">
									<li class="home_slider_custom_dot active">01.</li>
									<li class="home_slider_custom_dot">02.</li>
									<li class="home_slider_custom_dot">03.</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!-- Ads -->
	<div class="avds">
		<div class="avds_container d-flex flex-lg-row flex-column align-items-start justify-content-between">
			{{--sale max--}}
			<div class="avds_small">
				<div class="avds_background" style="background-image:url(/storage/app/files/{{$saleMax->picture}})"></div>
				<div class="avds_small_inner">
					<div class="avds_discount_container">
						<img src="/public/templates/shop/images/discount.png" alt="">
						<div>
							<div class="avds_discount">
								<div>{{$saleMax->sale}}<span>%</span></div>
								<div>Sale tụt huyết áp</div>
							</div>
						</div>
					</div>
					<div class="avds_small_content">
						<div class="avds_title">{{$saleMax->nameproduct}}</div>
						<div class="avds_link"><a href="{{route('shop.shop.product',$saleMax->id_product)}}">Xem thêm</a></div>
					</div>
				</div>
			</div>
			<div class="avds_large">
				<div class="avds_background" style="background-image:url(/storage/app/news/{{$newFirst1->picture_news}})"></div>
				<div class="avds_large_container">
					<div class="avds_large_content">
						<div class="avds_title" style="height: 250px;overflow: hidden">{{$newFirst1->news}}</div>
						<div class="avds_link avds_link_large"><a href="{{route('shop.shop.newsDetail',$newFirst1->id_news)}}">Xem thêm</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Products -->
	<div class="products">
		<div class="container">
			<div class="row">
				<div class="col">

					<div class="product_grid">
						@if(!empty($productIndex))
							@foreach($productIndex as $value)
								@php
									$sale = $value->price- ($value->price/100*10);
								@endphp
								<div class="product">
							<div class="product_image"><img style="width: auto;height: 270px;" src="/storage/app/files/{{$value->picture}}" alt=""></div>
									<button class="newsletter_button" id="{{$value->id_product}}" style="width: 100%;height: 40px">
										<span>Thêm vào giỏ hàng</span>
										{{--<a href="{{route('shop.shop.addCart',$value->id_product)}}"><span>Mua</span></a>--}}
									</button>
							<div class="product_extra product_new"><a href="/public/templates/shop/categories.html">{{$value->namecat}}</a></div>
							<div class="product_content">
								<div class="product_title"><a style="font-size: 15px" href="{{route('shop.shop.product',$value->id_product)}}">{{$value->nameproduct}}</a></div>
								<div class="product_price">
									@if(!empty($value->sale))
										<del>{{number_format($value->price)}}</del>.đ
										<p>{{number_format($sale)}}.đ</p>
									@else
										{{number_format($value->price)}}.đ
									@endif
								</div>
							</div>
						</div>
							@endforeach
						@endif
					</div>
					<div style="float: right">{{$productIndex->links()}}</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Ad -->

	<div class="avds_xl">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="avds_xl_container clearfix">
						<div class="avds_xl_background" style="background-image:url(/storage/app/news/{{$newFirst2->picture_news}})"></div>
						<div class="avds_xl_content">
							<div class="avds_title" style="height: 200px;overflow: hidden">{{$newFirst2->news}}</div>
							<div class="avds_link avds_xl_link"><a href="{{route('shop.shop.newsDetail',$newFirst2->id_news)}}">Xem thêm</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Icon Boxes -->

	<div class="icon_boxes">
		<div class="container">
			<div class="row icon_box_row">

				<!-- Icon Box -->
				<div class="col-lg-4 icon_box_col">
					<div class="icon_box">
						<div class="icon_box_image"><img src="/public/templates/shop/images/icon_1.svg" alt=""></div>
						<div class="icon_box_title">Miễn phí ship trong toàn quốc</div>
						<div class="icon_box_text">
							<p>Đơn hàng trị giá trên 999,999đ sẽ được miễn phí ship toàn quốc và kèm theo phần quà hấp dẩn</p>
						</div>
					</div>
				</div>

				<!-- Icon Box -->
				<div class="col-lg-4 icon_box_col">
					<div class="icon_box">
						<div class="icon_box_image"><img src="/public/templates/shop/images/icon_2.svg" alt=""></div>
						<div class="icon_box_title">Đổi trả trong vòng 7 ngày</div>
						<div class="icon_box_text">
							<p>Các sản phẩm tại cửa hàng có thể đổi trả trong vòng 7 ngày nếu còn tem, mác</p>
						</div>
					</div>
				</div>

				<!-- Icon Box -->
				<div class="col-lg-4 icon_box_col">
					<div class="icon_box">
						<div class="icon_box_image"><img src="/public/templates/shop/images/icon_3.svg" alt=""></div>
						<div class="icon_box_title">Hổ trợ 24/7</div>
						<div class="icon_box_text">
							<p>Nếu bạn cần hổ trợ hãy liên hệ với chúng tôi, phục vụ 24h/7</p>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	{{--bottom bar--}}
	@include('templates.shop.inc.bottom-bar')
	{{--!bottom bar--}}
@endsection
@section('ajax')
	<script type="text/javascript">
		$(document).ready(function() {
			$('.newsletter_button').click(function () {
				var id = $(this).attr('id');
				$.ajax({
					url: 'addcart/'+id,
					type: 'GET',
					cache:false,
					data:{
						'id':id,
					},
					headers:
							{
								'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							},
					success: function (data) {
						$('.msg').show();
						setTimeout(function(){
							$('.msg').hide()
						}, 750);
						$('#ajax').html(data);
					}
				});
			});
		});
	</script>
@endsection

