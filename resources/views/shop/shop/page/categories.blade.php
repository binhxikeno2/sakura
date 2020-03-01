@extends('templates.shop.master')
@section('title') Danh Mục @endsection
<link rel="stylesheet" type="text/css" href="/public/templates/shop/styles/categories.css">
<link rel="stylesheet" type="text/css" href="/public/templates/shop/styles/categories_responsive.css">
@section('content')
	<div class="home">
		<div class="home_container">
			<div class="home_background" style="background-image:url(/public/templates/shop/images/slideshow_3.jpg)"></div>
			<div class="home_content_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_content">
								<div class="home_title">{{$cat->namecat}}<span>.</span></div>
								<div class="home_text"><p></p></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="products">
		<div class="container">
			<div class="row">
				<div class="col">

					<!-- Product Sorting -->
					<div class="sorting_bar d-flex flex-md-row flex-column align-items-md-center justify-content-md-start">

						<div class="sorting_container ml-md-auto">
							<div class="sorting">
								<ul class="item_sorting">
									<li>
										<span class="sorting_text">Sort by</span>
										<i class="fa fa-chevron-down" aria-hidden="true"></i>
										<ul>
											<li class="product_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>Default</span></li>
											<li class="product_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span>Price</span></li>
											<li class="product_sorting_btn" data-isotope-option='{ "sortBy": "stars" }'><span>Name</span></li>
										</ul>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">

					<div class="product_grid">
						<!-- Product -->
						@foreach($objectItem as $value)
							<div class="product">
							<div class="product_image"><img src="/storage/app/files/{{$value->picture}}" style="width: 270px;height: 300px"></div>
								<button class="newsletter_button" id="{{$value->id_product}}" style="width: 100%;height: 40px">
									<a href="{{route('shop.shop.addCart',$value->id_product)}}"><span>Mua</span></a>
								</button>
							<div class="product_extra product_new"><a href="categories.html">{{$value->namecat}}</a></div>
							<div class="product_content">
								<div class="product_title"><a href="{{route('shop.shop.product',$value->id_product)}}">{{$value->nameproduct}}</a></div>
								@if(!empty($value->sale))
									<div class="product_price"><del>{{number_format($value->price)}}</del> đ</div>
									<div class="product_price">{{number_format($value->price-($value->price/100*10))}} đ</div>
								@else
									<div class="product_price">{{number_format($value->price)}} đ</div>
								@endif
							</div>
						</div>
						@endforeach
						<!-- Product -->
					</div>
					<div class="product_pagination">
						{{$objectItem->links()}}
					</div>

				</div>
			</div>
		</div>
	</div>
	<div class="icon_boxes">
		<div class="container">
			<div class="row icon_box_row">

				<!-- Icon Box -->
				<div class="col-lg-4 icon_box_col">
					<div class="icon_box">
						<div class="icon_box_image"><img src="/public/templates/shop/images/icon_1.svg" alt=""></div>
						<div class="icon_box_title">Free Shipping Worldwide</div>
						<div class="icon_box_text">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
						</div>
					</div>
				</div>

				<!-- Icon Box -->
				<div class="col-lg-4 icon_box_col">
					<div class="icon_box">
						<div class="icon_box_image"><img src="/public/templates/shop/images/icon_2.svg" alt=""></div>
						<div class="icon_box_title">Free Returns</div>
						<div class="icon_box_text">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
						</div>
					</div>
				</div>

				<!-- Icon Box -->
				<div class="col-lg-4 icon_box_col">
					<div class="icon_box">
						<div class="icon_box_image"><img src="/public/templates/shop/images/icon_3.svg" alt=""></div>
						<div class="icon_box_title">24h Fast Support</div>
						<div class="icon_box_text">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	@include('templates.shop.inc.bottom-bar')
@endsection
