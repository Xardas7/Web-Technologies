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
            <!-- Start Checkout Area -->
            @php
                $user=Auth::user();
                $address=$user->addresses->last()
                @endphp
            <div class="container">
                <div class="checkput-login">
                    @if($address != null)
                    <div class="top-title">
                        <p><a data-toggle="collapse" href="#checkout-login" aria-expanded="false" aria-controls="checkout-login">Ship to a different address?</a></p>
                    </div>

                    <div class="collapse" id="checkout-login">
                        <div class="checkout-login-collapse d-flex flex-column">
                        @endif
                            <!-- Start Billing Details Form -->
                            <div class="container">
                                <form method="POST" action="/address" class="billing-form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-8 col-md-6">
                                            <h3 class="billing-title mt-20 mb-10">Update your address</h3>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <input type="text" name="name" placeholder="First name*" onfocus="this.placeholder=''" onblur="this.placeholder = 'First name*'" required class="common-input">
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" name="last_name" placeholder="Last name*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Last name*'" required class="common-input">
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" name="phone_number" placeholder="Phone number*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Phone number*'" required class="common-input">
                                                </div>
                                                <div class="col-lg-12">
                                                    <input type="text" name="address" placeholder="Address line 01*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Address line 01*'" required class="common-input">
                                                </div>
                                                <div class="col-lg-12">
                                                    <input type="text" name="address_additional" placeholder="Address line 02*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Address line 02*'" required class="common-input">
                                                </div>
                                                <div class="col-lg-12">
                                                    <input type="text" name="city" placeholder="Town/City*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Town/City*'" required class="common-input">
                                                </div>
                                                <div class="col-lg-12">
                                                    <input type="text" name="country" placeholder="Country*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Country*'" required class="common-input">
                                                </div>
                                                <div class="col-lg-12">
                                                    <input type="text" name="postal_code" placeholder="Postcode/ZIP" onfocus="this.placeholder=''" onblur="this.placeholder = 'Postcode/ZIP'" class="common-input">
                                                </div>
                                            </div>
                                            <!-- Potra servire per fatturazione/spedizione -->
                                          <!--  <div class="mt-20">
                                                <input type="checkbox" class="pixel-checkbox" id="login-3">
                                                <label for="login-3">Create an account?</label>
                                            </div>   -->
                                            <h3 class="billing-title mt-20 mb-10">Billing Details</h3>
                                            <textarea placeholder="Order Notes" onfocus="this.placeholder=''" onblur="this.placeholder = 'Order Notes'" required class="common-textarea"></textarea>
                                        </div>
                                    </div>
                                    <button class="view-btn color-2 w-100 mt-20"><span>Proceed to Payment</span></button>
                                </form>
                            </div>
                            @if($address != null)
                        </div>
                    </div>
                    <!-- End  New Billing Details Form -->
                    <div class="container">
                        <h3 class="billing-title mt-20 mb-10">Continue with saved address</h3>
                        <div class="container" style="text-align: center;">
                            <form action="/payments" class="billing-form">
                                <h3 >Billing Details</h3>
                                <p></p>
                                <p>
                                    {{$user->name}}
                                    {{$user->surname}}<br>
                                    {{$address->address}}<br>
                                    {{$address->address_additional}}<br>
                                    {{$address->city}}
                                    {{$address->postal_code}}<br>
                                    {{$address->country}}<br>
                                </p>
                                <button class="view-btn color-2 w-100 mt-20"><span>Proceed to Payment</span></button>
                            </form>
                    </div>
                </div>
                        @endif
            </div>
            <!-- End Checkout Area -->

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
