@extends('templates.shop.master')
@section('title') Tin Tức @endsection
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
                                <div class="home_title"><span>Tin Tức.</span></div>
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
                    <div class="sorting_bar d-flex flex-md-row flex-column align-items-md-center justify-content-md-start">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">

                    <div class="product_grid">
                        <!-- Product -->
                        @foreach($news as $value)
                            <div class="product">
                                <div class="product_image"><img src="/storage/app/news/{{$value->picture_news}}" style="width: 270px;height: 300px"></div>
                                <div class="product_content">
                                    <div class="product_title" style="text-align: justify"><a href="{{route('shop.shop.newsDetail',$value->id_news)}}">{{$value->news}}</a></div>
                                </div>
                            </div>
                    @endforeach
                    <!-- Product -->
                    </div>
                    <div class="product_pagination">
                        {{$news->links()}}
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