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
                <h1>Shopping Cart</h1>
                <nav class="d-flex align-items-center justify-content-start">
                    <a href="home.blade.php">Home<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                    <a href="cart.blade.php">Shopping Cart</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!-- Start Cart Area -->
<div class="container">
    @if(count($products) == 0)
    <div class="container">
        <p class="text-center">Your shopping cart is empty!</p>
    </div>
    @else
    <div class="cart-title">
        <div class="row">
            <div class="col-md-2 offset-1">
                <h6 class="ml-15">PRODUCT</h6>
            </div>
            <div class="col-md-2 offset-1">
                <h6 class="ml-15">SIZE</h6>
            </div>
            <div class="col-md-2">
                <h6>PRICE</h6>
            </div>
            <div class="col-md-2">
                <h6>QUANTITY</h6>
            </div>
            <div class="col-md-2">
                <h6>TOTAL</h6>
            </div>
        </div>
    </div>


    @foreach ($products as $product)
    <div class="cart-single-item">
        <div class="row align-items-center">
            <div class="col-md-4 col-12">
                <div class="product-item d-flex align-items-center">
                    <img src="{{ Storage::exists($product->images->first()) ? asset("storage/".$product->images->first()) :  $product->images->first()->path}}" style="width:150px;;" class="img-fluid" alt="">
                    <a href="/{{ $product->name }}">
                        <h6>{{ $product->name }}</h6>
                    </a>
                </div>
            </div>

            <div class="col-md-2 col-6">
                <div class="size">{{ $product->details->size}}</div>
            </div>

            <div class="col-md-2 col-6">
                <div class="price">{{ $product->price."€" }}</div>
            </div>

            <div class="col-md-2 col-6 p-1">
                <div class="quantity-container d-flex align-items-center mt-15">
                    <input type="number" class="quantity-amount cart-to-checkout"
                        value={{ $product->details->quantity }} data-id="{{$product->id}}" />
                    <div class="arrow-btn d-inline-flex flex-column">
                        <button class="increase arrow cart" type="button" title="Increase Quantity"><span
                                class="lnr lnr-chevron-up"></span></button>
                        <button class="decrease arrow cart" type="button" title="Decrease Quantity"><span
                                class="lnr lnr-chevron-down"></span></button>
                    </div>
                </div>
            </div>

            <div class="col-md-2 col-12 p-1">
                <div class="total"></div>
            </div>

        </div>
    </div>
    @endforeach

    <div class="row subtotal-area d-flex align-items-center justify-content-end">
        <div class="col-2 title text-uppercase">Subtotal</div>
        <div class="col-2 subtotal"></div>
    </div>
    <div class="d-flex align-items-center justify-content-between flex-wrap">
        <div>
            <a class="view-btn color-2 mt-10" href="/home"><span>Continue Shopping</span></a>
        </div>
        <form id="checkout" method='GET' action="/checkout" class="d-inline-flex flex-column align-items-end">

            <button id='buy' class="view-btn color-2 mt-10"><span>Buy</span></button>
        </form>
    </div>
    @endif
</div>
<!-- End Cart Area -->
@endsection

@section('js')
<script src="js/vendor/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
    integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
</script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/jquery.sticky.js"></script>
<script src="js/ion.rangeSlider.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="/js/custom.js"></script>
<script src="js/main.js"></script>
<script src="js/shoppingCart.js"></script>

@endsection
