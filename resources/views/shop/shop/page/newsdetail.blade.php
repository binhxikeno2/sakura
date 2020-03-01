@extends('templates.shop.master')
<link rel="stylesheet" type="text/css" href="/public/templates/shop/styles/product.css">
<link rel="stylesheet" type="text/css" href="/public/templates/shop/styles/product_responsive.css">
@section('title') Tin Tức @endsection
@section('content')
    <div class="home">
        <div class="home_container">
            <div class="home_background" style="background-image:url(/public/templates/shop/images/slideshow_1.jpg)"></div>
            <div class="home_content_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_content">
                                <div class="home_title">Tin Tức<span>.</span></div>
                                <div class="home_text"><p></p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product_details">
        <div class="container">
            <div class="row details_row">

                <!-- Product Image -->
                <div class="col-lg-6">
                    <div class="details_image">
                        <div class="details_image_large"><img src="/storage/app/news/{{$newsDetail->picture_news}}" style="width: 450px;height: 550px" alt=""></div>
                    </div>
                </div>

                <!-- Product Content -->
                <div class="col-lg-6">
                    <div class="details_content">
                        <div class="details_name">{{$newsDetail->news}}</div>
                    <!-- In Stock -->
                        <div class="details_text">
                            <p>{!! $newsDetail->preview !!}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row description_row">
                <div class="col">
                    <div class="description_title_container">
                        <div class="description_title">Chi tiết</div>
                    </div>
                    <div class="description_text">
                        <p>{!! $newsDetail->detail !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="products">
        <div class="container">
            <div class="row">
            </div>
            <div class="row">
                <div class="col">

                    <div class="product_grid">

                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('templates.shop.inc.bottom-bar')
@endsection

