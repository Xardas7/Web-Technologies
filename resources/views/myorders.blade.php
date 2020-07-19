@extends('layouts.app')

{{-- @section('css')
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/ion.rangeSlider.css" />
    <link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
@endsection --}}


@section('content')
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
                <div class="col-first">
                    <h1>My Orders</h1>
                    <nav class="d-flex align-items-center justify-content-start">
                        <a href="/">Home<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                        <a href="/orders">My Orders</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!-- Start Cart Area -->
    @if(count($orders) == 0)
        <div class="container">
            <p class="text-center">There's nothing here!</p>
        </div>
    @endif
    @foreach($orders as $order)
    <div class="container divide-from-top">
        <div class="cart-title">
            <div class="row">
                <div class="col-md-2">
                    <h6 class="ml-10">ORDER PLACED:<br>{{ $order->created_at->format('d M Y') }}</h6>
                </div>
                <div class="col-md-2">
                    <h6 class="ml-10">TOTAL:<br>EUR {{ $order->amount }}</h6>
                </div>
                <div class="col-md-4">
                    <h6 class="ml-10">SHIPPED TO:<br>
                        @if($order->shipping_address){{ $order->shipping_address }}@else The address is no longer available @endif</h6>
                </div>
                <div class="col-md-2">
                    <h6>STATUS:<br>{{ ucfirst($order->state) }}</h6>
                </div>
                <div class="col-md-2">
                    <h6>ORDER # {{ $order->id }}</h6>
                </div>
            </div>

        </div>

                @foreach ($order->products as $product)
                    <div class="cart-single-item" >
                        <div class="row align-items-center">
                            <div class="col-md-6 col-5">
                                <div class="product-item d-flex align-items-center">
                                    <img src="{{$product->image_path}}" style="width:150px;" class="img-fluid" alt="">
                                    <a href="/{{ $product->product_name }}">
                                        <h6>
                                            <b>{{ $product->product_name }}</b>
                                            <br>{!! $product->product_description !!}
                                        </h6>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-2">
                                <div class="price">Quantity: x{{ $product->quantity }}</div>
                            </div>
                            <div class="col-md-2 col-2">
                                <div class="price">Price: {{ $product->product_price."€" }}</div>
                            </div>
                        </div>
                    </div>

                @endforeach
    </div>
        @endforeach

        @endsection
        @section('js')
        <script src="/js/vendor/jquery-2.2.4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
            integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
        </script>
        <script src="/js/vendor/bootstrap.min.js"></script>
        <script src="/js/jquery.ajaxchimp.min.js"></script>
        <script src="/js/jquery.nice-select.min.js"></script>
        <script src="/js/jquery.sticky.js"></script>
        <script src="/js/nouislider.min.js"></script>
        <script src="/js/jquery.magnific-popup.min.js"></script>
        <script src="/js/owl.carousel.js"></script>
        <script src="/js/custom.js"></script>
        <script src="/js/main.js"></script>
        @endsection



















