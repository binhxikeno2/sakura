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
                                        <li>Thanh Toán Online</li>
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
                <form action="">
                    <div>
                        <h4 style="padding-bottom: 20px">Chọn hình thức thanh toán</h4>
                        <div style="width: 500px;">
                            <div id="paypal-button-container"></div>
                        </div>
                    </div>
                </form>
            </div>
    </div>
@endsection
@section('ajax')
    <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>

    <script>
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({

            // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '{{$total}}'
                        }
                    }]
                });
            },

            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    // Show a success message to the buyer
                    alert('Thanh toán thành công  ' + details.payer.name.given_name + '!');
                    window.location = '/donhang/'+{{Auth::user()->id}}
                });
            }


        }).render('#paypal-button-container');
    </script>
@endsection