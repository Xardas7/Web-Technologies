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
                    <h1>Product Checkout</h1>
                    <nav class="d-flex align-items-center justify-content-start">
                        <a href="index.blade.php">Home<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                        <a href="checkout.blade.php">Product Checkout</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->
    <div class="col-lg-4 col-md-6">
        <div class="order-wrapper mt-50">
            <h3 class="billing-title mb-10">Your Order</h3>
            <div class="order-list">
                <div class="list-row d-flex justify-content-between">
                    <div>Product</div>
                    <div>Total</div>
                </div>
                <div class="list-row d-flex justify-content-between">
                    <div>Pixelstore fresh Blackberry</div>
                    <div>x 02</div>
                    <div>$720.00</div>
                </div>
                <div class="list-row d-flex justify-content-between">
                    <div>Pixelstore fresh Blackberry</div>
                    <div>x 02</div>
                    <div>$720.00</div>
                </div>
                <div class="list-row d-flex justify-content-between">
                    <div>Pixelstore fresh Blackberry</div>
                    <div>x 02</div>
                    <div>$720.00</div>
                </div>
                <div class="list-row d-flex justify-content-between">
                    <h6>Subtotal</h6>
                    <div>$2160.00</div>
                </div>
                <div class="list-row d-flex justify-content-between">
                    <h6>Shipping</h6>
                    <div>Flat rate: $50.00</div>
                </div>
                <div class="list-row d-flex justify-content-between">
                    <h6>Total</h6>
                    <div class="total">$2210.00</div>
                </div>
                <div class="d-flex align-items-center mt-10">
                    <input class="pixel-radio" type="radio" id="check" name="brand">
                    <label for="check" class="bold-lable">Check payments</label>
                </div>
                <p class="payment-info">Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <input class="pixel-radio" type="radio" id="paypal" name="brand">
                        <label for="paypal" class="bold-lable">Paypal</label>
                    </div>
                    <img src="/img/organic-food/pm.jpg" alt="" class="img-fluid">
                </div>
                <p class="payment-info">Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                <div class="mt-20 d-flex align-items-start">
                    <input type="checkbox" class="pixel-checkbox" id="login-4">
                    <label for="login-4">I’ve read and accept the <a href="#" class="terms-link">terms & conditions*</a></label>
                </div>
                <button class="view-btn color-2 w-100 mt-20"><span>Proceed to Checkout</span></button>
            </div>
        </div>
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
    <script src="/js/custom.js"></script>
    <script src="js/main.js"></script>
    <script src="js/owl.carousel.min.js"></script>
@endsection
