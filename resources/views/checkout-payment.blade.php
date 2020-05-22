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
                        <a href="home.blade.php">Home<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                        <a href="checkout.blade.php">Product Checkout</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->
    <div class="container">
        <div class="order-wrapper mt-20">
            <div class="top-title">
                <p>Have a coupon? <a data-toggle="collapse" href="#checkout-cupon" aria-expanded="false" aria-controls="checkout-cupon">Click here to enter your code</a></p>
            </div>
            <div class="collapse" id="checkout-cupon">
                <div class="checkout-login-collapse d-flex flex-column">
                    <form action="#" class="d-block">
                        <div class="row">
                            <div class="col-lg-8">
                                <input type="text" placeholder="Enter coupon code" onfocus="this.placeholder=''" onblur="this.placeholder = 'Enter coupon code'" required class="common-input mt-10">
                            </div>
                        </div>
                        <button class="view-btn color-2 mt-20"><span>Apply Coupon</span></button>
                    </form>
                </div>
            </div>
        </div>
        <form method="post" action="/confermation" class="billing-form">
            @csrf
            <div class="row">
                <div class="col-lg-8 col-md-6 order-wrapper mt-50">
                    <h3 class="billing-title mt-20 mb-10">Payment Type</h3>
                    <!--  start payment methods    -->
                        <div class="order-wrapper mt-50">
                        <div class="d-flex align-items-center">
                            <input class="pixel-radio" type="radio" id="paypal" name="Paypal">
                            <label for="paypal" class="bold-lable">Paypal</label>
                        </div>
                        </div>
                    <p class="payment-info">Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                   <hr/>
                    <div class="order-wrapper mt-50">
                        <div class="d-flex align-items-center">
                            DA FARE, BRYANT PLEASE SOLO TU CONOSCI JS ABBASTANZA DA RIUSCIRCI
                            <!-- TODO

                            idea sarebbe di mostrare se scegliere carta salvata o un form per una nuova pero si incasina tutto

                            <p><a data-toggle="collapse" href="#checkout-card" aria-expanded="false" aria-controls="checkout-card">
                                    <input class="pixel-radio" type="radio" id="credit_card" name="brand">
                                    <label for="credit_card" class="bold-lable">Credit Card</label>
                                </a></p>

                            <div class="collapse" id="checkout-card">
                                <input class="pixel-radio" type="radio" id="credit_card" name="brand">
                                <label for="credit_card" class="bold-lable">Saved credit card</label>

                                <p><a data-toggle="collapse" href="#checkout-newcard" aria-expanded="false" aria-controls="checkout-newcard">
                                    <input class="pixel-radio" type="radio" id="credit_card" name="brand">
                                    <label for="credit_card" class="bold-lable">New Credit Card</label>
                                    </a></p>

                                <div class="collapse" id="checkout-newcard">
                                    <div class="col-lg-6">
                                        <input type="text" name="last_name" placeholder="Last name*" onfocus="this.placeholder=''" onblur="this.placeholder = 'name'" required class="common-input">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="last_name" placeholder="Last name*" onfocus="this.placeholder=''" onblur="this.placeholder = 'credit cart number'" required class="common-input">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="last_name" placeholder="Last name*" onfocus="this.placeholder=''" onblur="this.placeholder = 'date'" required class="common-input">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="last_name" placeholder="Last name*" onfocus="this.placeholder=''" onblur="this.placeholder = 'CV'" required class="common-input">
                                    </div>
                                </div>
                            </div>
                         END TODO  -->
                        </div>


                    </div>
                    <hr/>
                    <div class="order-wrapper mt-50">
                        <div class="d-flex align-items-center">
                            <input class="pixel-radio" type="radio" id="paypal" name="at_delivery">
                            <label for="paypal" class="bold-lable">Pay at delivery</label>
                        </div>
                    </div>
                    <!--- end payment methods -->
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="order-wrapper mt-50">
                        <h3 class="billing-title mb-10">Your Order</h3>
                        <div class="order-list">
                            <div class="list-row d-flex justify-content-between">
                                <div>Product</div>
                                <div>Total</div>
                            </div>
                            @php
                                $products=Auth::user()->shoppingCart->products;
                                $total=0;
                            @endphp
                            @foreach($products as $product)
                            <div class="list-row d-flex justify-content-between">
                                <div>{{$product->name}}</div>
                                <div style="text-align: center">x {{$product->details->quantity}}</div>
                                <div>{{$product->price}}€</div>
                            </div>
                                @php
                                $total+=$product->price;
                                @endphp
                            @endforeach
                            <div class="list-row d-flex justify-content-between">
                                <h6>Subtotal</h6>
                                <div>{{$total}}€</div>
                            </div>
                            <div class="list-row d-flex justify-content-between">
                                <h6>Shipping</h6>
                                <div>Shipping cost: 10.00€</div>
                            </div>
                            <div class="list-row d-flex justify-content-between">
                                <h6>Total</h6>
                                <div class="total">{{$total+10}}€</div> <!-- totale + costi spedizione -->
                            </div>
                            <p class="payment-info">Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                            <div class="mt-20 d-flex align-items-start">
                                <input type="checkbox" class="pixel-checkbox" id="login-4">
                                <label for="login-4">I’ve read and accept the <a href="#" class="terms-link">terms & conditions*</a></label>
                            </div>
                            <button class="view-btn color-2 w-100 mt-20"><span>Confirm and buy</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

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
