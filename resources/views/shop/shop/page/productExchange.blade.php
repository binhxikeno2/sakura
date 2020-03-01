@extends('templates.shop.master')
<link rel="stylesheet" type="text/css" href="/public/templates/shop/styles/product.css">
<link rel="stylesheet" type="text/css" href="/public/templates/shop/styles/product_responsive.css">
@section('title') Sản Phẩm @endsection
@section('content')
    <div class="home">
        <div class="home_container">
            <div class="home_background" style="background-image:url(/public/templates/shop/images/slideshow_1.jpg)"></div>
            <div class="home_content_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_content">
                                <div class="home_title">{{$objectItem->namecat}}<span>.</span></div>
                                <div class="home_text"><p></p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product_details">
        <form action="{{route('shop.shop.postExchange')}}" method="post">
            @csrf
            <div class="container">
                <div class="row details_row">

                    <!-- Product Image -->
                    <div class="col-lg-6">
                        <div class="details_image">
                            <div class="details_image_large"><img src="/storage/app/files/{{$objectItem->picture}}" style="width: 450px;height: 550px" alt=""><div class="product_extra product_new"><a href="categories.html">New</a></div></div>
                            <div class="details_image_thumbnails d-flex flex-row align-items-start justify-content-between">
                                @php $pic= json_decode($objectItem->picture_descrip) @endphp
                                @foreach($pic as $value)
                                    <div class="details_image_thumbnail active" data-image="images/details_1.jpg"><img src="/storage/app/files/{{$value}}" style="width: 250px;height: 150px" alt=""></div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Product Content -->
                    <div class="col-lg-6">
                        <div class="details_content">
                            <div class="details_name">{{$objectItem->nameproduct}}</div>
                            @if(!empty($objectItem->sale))
                                <div class="details_discount">{{number_format($objectItem->price)}} đ</div>
                                <div class="details_price">
                                    @php
                                        $sale = $objectItem->price - ($objectItem->price/100*$objectItem->sale)
                                    @endphp
                                    {{number_format($sale)}} đ
                                </div>
                            @else
                                <div class="details_price">{{number_format($objectItem->price)}} đ</div>
                        @endif
                        <!-- In Stock -->
                            <div class="in_stock_container">
                                <div class="availability">Danh mục:</div>
                                <span>{{$objectItem->namecat}}</span>
                            </div>
                            <div class="details_text">
                                <p>{!! $objectItem->description !!}</p>
                            </div>

                            <!-- Product Quantity -->
                            <div class="product_quantity_container">
                                <div class="product_quantity clearfix">
                                    <span>Số lượng</span>
                                    <input  id="quantity_input" class="qty" type="number" pattern="[1-9]" value="1">
                                </div>
                                <div class="exchange button cart_button"><a href="" data-toggle="modal" data-target="#exampleModal">Đổi thưởng</a></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row description_row">
                    <div class="col">
                        <div class="description_title_container">
                            <div class="description_title"><a href="javascript:void(0)" style="color:black">Mô tả</a></div>
                            <div class="reviews_title"><a href="javascript:void(0)">Bình luận</a></div>
                        </div>
                        <div class="description_text">
                            <p>{!! $objectItem->detail_text !!}</p>
                        </div>
                        <div class="review-text" style="display: none">
                            {{--cmt--}}
                            <div class="comment-wrapper">
                                <form action="{{route('shop.shop.postComment',$objectItem->id_product)}}" method="post">
                                    @csrf
                                    <div class="panel panel-info">
                                        <div class="panel-heading"></br>
                                            Gởi phản hồi về sản phẩm
                                        </div>
                                        <div class="panel-body">
                                            <textarea class="form-control" id="content"  placeholder="Viết vào đây..." rows="3"></textarea>
                                            <br>
                                            <a href="javascript:void(0)" id="comment" class="btn btn-info">Gởi</a>
                                            <div class="clearfix"></div>
                                            <hr>
                                            <ul class="media-list">
                                                <div id="resultcmt">
                                                    @foreach($comment as $value)
                                                        <li class="media">
                                                            <a href="#" class="pull-left">
                                                                <img src="https://bootdey.com/img/Content/user_1.jpg" alt="" class="img-circle">
                                                            </a>
                                                            <div class="media-body">
                                                <span class="text-muted pull-right">
                                                    <small class="text-muted"></small>
                                                </span>
                                                                <strong class="text-primary">{{$value->fullname}}</strong>
                                                                <p>{{$value->content}}
                                                                </p>
                                                            </div>
                                                        </li><br/>
                                                    @endforeach
                                                </div>
                                            </ul>
                                        </div>
                                </form>
                            </div>
                        </div>
                        {{--end cmt--}}
                    </div>
                </div>
            </div>
        </form>
    </div>
    </div>
    <div class="products">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="products_title">Sản phẩm liên quan</div>
                </div>
            </div>
            <div class="row">
                <div class="col">

                    <div class="product_grid">
                    @foreach($arRelate as $value)
                        <!-- Product -->
                            <div class="product">
                                <div class="product_image" style="height: 300px"><img src="/storage/app/files/{{$value->picture}}" style="width: 270px;height: 300px;"></div>
                                <button class="newsletter_button" style="width: 100%;height: 40px"><a href="{{route('shop.shop.productExchange',$value->id_product)}}"><span>Đổi</span></a></button>
                                <div class="product_extra product_new"><a href="categories.html">{{$value->namecat}}</a></div>
                                <div class="product_content">
                                    <div class="product_title"><ơ>{{$value->nameproduct}}</ơ></div>
                                </div>
                            </div>
                            <!-- Product -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('templates.shop.inc.bottom-bar')
@endsection
{{--form modal--}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{route('shop.shop.change',$objectItem->id_product)}}" method="post">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Đổi thưởng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true ">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><strong>Sản phẩm </strong>: {{$objectItem->nameproduct}}</p>
                    <p><strong>Tiền quy đổi </strong>: {{number_format($objectItem->price)}} đ</p>
                    <p><strong>Số lượng</strong>: <input  style="border: none" type="text" name="qty" id="result" value=""></p>
                    <p><strong>Thành tiền</strong>: <input  style="border: none" type="text" name="total" id="total" value="">
                    <p><strong>Số dư trong tài khoản </strong>: {{number_format(Auth::user()->rewardpoint)}} đ</p>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="submit btn btn-primary" value="Đồng Ý"/>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </form>
</div>
{{--end form modal--}}
@section('ajax')
    <script>
        $(document).ready(function () {
            $('.description_title').click(function () {
                $('.description_text').show();
                $('.review-text').hide();
            });
            $('.reviews_title').click(function () {
                $('.review-text').show();
                $('.description_text').hide();
            })
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#comment').click(function () {
                var content = $(this).parent().find('#content').val();
                var token = $("input[name='_token']").val();
                var idproduct = '{{$objectItem->id_product}}';
                $.ajax({
                    url: '/comment/'+idproduct,
                    type: 'POST',
                    cache:false,
                    data:{
                        "_token":token,
                        "content":content,
                        "idproduct":idproduct,
                    },
                    success: function (data) {
                        $('#content').val("")
                        $('#resultcmt').html(data)
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.exchange').click(function () {
                var token = $("input[name='_token']").val();
                var qty = $(this).parent().find('.qty').val();
                var price = '{{$objectItem->price}}';
                $.ajax({
                    url: '/postExchange/',
                    type: 'get',
                    cache:false,
                    data:{
                        "_token":token,
                        "qty":qty,
                    },
                    success: function (data) {
                        var total = price*data;
                        $('#result').val(data);
                        $('#total').val(total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                    }
                });
            });
        });
    </script>
@endsection
