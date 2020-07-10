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
                <h1>Wish List</h1>
                <nav class="d-flex align-items-center justify-content-start">
                    <a href="/">Home<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                    <a href="/wishlist">Wish List</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!-- Start Cart Area -->

<div class="container">
    <div class="cart-title">
        <div class="row">
            <div class="col-md-6">
                <h6 class="ml-15">Product</h6>
            </div>
            <div class="col-md-2">
                <h6>Price</h6>
            </div>
            <div class="col-md-2">
                <h6>Add To Shopping Cart</h6>
            </div>
            <div class="col-md-1 align-items-left">
                <h6>Remove</h6>
            </div>
        </div>

    </div>
    @if($products->count() > 5 )
        <div class="cupon-area d-flex align-items-center justify-content-between flex-wrap">
            <a href="#" class="view-btn color-2"><span>Add All</span></a>
            <a href="#" class="view-btn color-2"><span>Remove All</span></a>
        </div>
    @endif
    @foreach ($products as $product)
        <div class="cart-single-item" >
            <div class="row align-items-center">
                <div class="col-md-6 col-12">
                    <div class="product-item d-flex align-items-center">
                        <img src="{{$product->images->first()->path}}" style="width:150px;" class="img-fluid" alt="" b>
                        <a href="/{{ $product->name }}">
                            <h6>{{ $product->name }}</h6>
                        </a>
                    </div>
                </div>
                <div class="col-md-2 col-6">
                    <div class="price">{{ $product->price."€" }}</div>
                </div>
                <div class="col-md-2 col-6 ">
                <a class="carello" href="#" data-id="{{ $product->id }}">
                            <i class="fa fa-shopping-cart fa-3x" style="color:black"></i>
                        </a>
                </div>
                <div class="col-md-2 col-12">
                <a href="#" class="deleteProductWishList" data-id="{{ $product->id }}">
                        <i class="fa fa-trash fa-3x" style="color: #f44a40;"></i>
                    </a>
                </div>
            </div>
    </div>
    @endforeach

    <div class="cupon-area d-flex align-items-center justify-content-between flex-wrap">
        <a href="#" class="genric-btn btn-success radius add"><span>Add All</span></a>
        <a href="#" class="genric-btn danger radius remove"><span>Remove All</span></a>
    </div>
@endsection

@section('js')
    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/ion.rangeSlider.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="/js/custom.js"></script>
    <script src="js/main.js"></script>

@endsection
