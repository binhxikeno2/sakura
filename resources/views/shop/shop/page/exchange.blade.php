@extends('templates.shop.master')
@section('title') Đổi quà @endsection
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
                                <div class="home_title">Đổi thưởng<span>.</span></div>
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
                            @foreach($arExchange as $value)
                                <div class="product">
                                    <div class="product_image"><img src="/storage/app/files/{{$value->picture}}" style="width: 270px;height: 300px"></div>
                                    <button class="newsletter_button" id="{{$value->id_product}}" style="width: 100%;height: 40px">
                                        <a href="{{route('shop.shop.productExchange',$value->id_product)}}"><span>Chi tiết</span></a>
                                    </button>
                                    <div class="product_extra product_new"><a href="">{{$value->namecat}}</a></div>
                                    <div class="product_content">
                                        <div class="product_title"><p>{{$value->nameproduct}}</p></div>
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
                            {{$arExchange->links()}}
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
    @include('templates.shop.inc.bottom-bar')
@endsection
@section('ajax')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.newsletter_button').click(function () {
                var id = $(this).data('id');
                var token = $("input[name='_token']").val();
                $.ajax({
                    url: 'postExchange/'+id,
                    type: 'get',
                    cache:false,
                    data:{
                        "_token":token,
                        "id":id,
                    },
                    success: function (data) {
                       alert('s');
                       window.location = '/';
                    }
                });
            });
        });
    </script>
@endsection