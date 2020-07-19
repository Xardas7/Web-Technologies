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
            <p>Have a coupon? <a data-toggle="collapse" href="#checkout-cupon" aria-expanded="false"
                    aria-controls="checkout-cupon">Click here to enter your code</a></p>
        </div>
        <div @if($coupon)class="collapse show"@else class="collapse" @endif id="checkout-cupon">
            <div class="checkout-login-collapse d-flex flex-column">
                <form action="/coupon" method='GET' class="d-block">
                    <div class="row">
                        <div class="col-lg-8">
                            <input type="text" name="coupon" placeholder="Enter coupon code" onfocus="this.placeholder=''"
                                onblur="this.placeholder = 'Enter coupon code'" required class="common-input mt-10" @if($coupon)value="{{$coupon}}@endif">
                        </div>
                    </div>
                    <div class="d-inline-flex">
                    <button class="view-btn color-2 mt-20"><span>Apply Coupon</span></button>
                    @if($coupon)
                    <div class="mt-20">
                        @if($discount_value == null)
                            Invalid Coupon
                        @else
                            Coupon Applied!
                        @endif
                    </div>
                    @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
    <form id="checkout" method="POST" action="/store" class="billing-form">
        @csrf
        <div class="row">
            <div class="col-lg-8 col-md-6 order-wrapper mt-50">
                <h3 class="billing-title mt-20 mb-10">Payment Type</h3>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <!--  start payment methods    -->
                <div class="order-wrapper mt-50">
                    <div class="d-flex align-items-center">
                        <input class="pixel-radio" type="radio" id="card" name="payment" value="card" checked>
                        <label for="card" class="bold-lable col-3">Credit card</label>
                        <div class="col-4">
                            <select id="cards" class="form-control ml-15 " name="card" required>
                                @php
                                    $cards = Auth::user()->cards;
                                @endphp
                                @if($cards)
                                @foreach($cards as $card)
                                <option value={{ $card->id }}>
                                    {{ preg_replace("/(.{4}$)(*SKIP)(*F)|(.)/","*",$card->card_number) }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                        <button class="view-btn color-2 col-4" data-toggle="modal" data-target="#addCardModal"
                            aria-expanded="false" aria-controls="checkout-cupon"><span>Insert card</span></button>
                    </div>
                </div>
<hr />

<div class="order-wrapper mt-50">
    <div class="d-flex align-items-center">
        <input class="pixel-radio" type="radio" id="paypal" name="payment" value="paypal">
        <label for="paypal" class="bold-lable">Paypal</label>
    </div>
</div>
<p class="payment-info">Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
<hr />

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

<div class="order-wrapper mt-50">
    <div class="d-flex align-items-center">
        <input class="pixel-radio" type="radio" id="delivery" name="payment" value="delivery">
        <label for="delivery" class="bold-lable">Pay at delivery</label>
    </div>
</div>
<div class="container">

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
            @foreach($products as $product)
            <div class="list-row d-flex justify-content-between">
                <div>{{$product->name}}</div>
                <div style="text-align: center">x {{$product->details->quantity}}</div>
                    <div>{{$product->price}}€</div>
            </div>
            @php
            $total=0;
            foreach ($products as $product)
            $total+=$product->price * $product->details->quantity;
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
            @if($discount_value!=null)
                <div class="list-row d-flex justify-content-between">
                    <h6>Discount</h6>
                    <div>{{number_format($total - $total * $discount_value)}}€</div>
                </div>
            @endif
            <div class="list-row d-flex justify-content-between">
                <h6>Total</h6>
                @if($discount_value!=null)
                    <div class="total">{{number_format($total * $discount_value + 10, 2) }}€</div> <!-- totale + costi spedizione -->
                @else
                    <div class="total">{{$total + 10}}€</div> <!-- totale + costi spedizione -->
                @endif
            </div>
            <div class="mt-20 d-flex align-items-start">
                @if($discount_value!=null)
                <input type="hidden" name="coupon_code" value="{{$coupon}}">
                @endif
                <input type="checkbox" class="pixel-checkbox" id="login-4" value="true" name="" required>
                <label for="login-4">I’ve read and accept the <a href="#" class="terms-link">terms &
                        conditions*</a></label>
            </div>
            <button class="view-btn color-2 w-100 mt-20"><span>Confirm and buy</span></button>
        </div>
    </div>
</div>
</div>
</form>

</div>

<div id="addCardModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Card</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <form id="addCardModalForm" class="col-12 p-5" action="/card/save" method="POST">
                            @csrf
                            {{-- <input form="add-card" type="hidden" name="_token"
                                value="DvKSczZWKst3PuBHwZdwODMKTUvxh1u4yMcNCWTp"> --}}
                            <div class="form-group row justify-content-center">
                                <label class="col-2 col-form-label">Number</label>
                                <div class="input-group-icon col-10">
                                    <div class="icon">
                                        <i class="far fa-credit-card"></i>
                                    </div>
                                    <input type="number" name="card_number" placeholder="Card number"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Card number'"
                                        required="" class="single-input" value="">
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <label for="example-date-input" class="col-2 col-form-label">Exp Date</label>
                                <div class="input-group-icon col-10">
                                    <div class="icon">
                                        <i class="far fa-calendar-alt"></i>
                                    </div>
                                    <input class="single-input" name="exp_date" type="text"
                                        placeholder="Example: 2020/04" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Example: 2020/04'" maxlength="7" required="">
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <label class="col-2 col-form-label">Type</label>
                                <div class="input-group-icon col-10">
                                    <div class="icon">
                                        <i class="fas fa-credit-card"></i>
                                    </div>
                                    <select class="form-control padding" name="type">
                                        <option value="visa">Visa
                                        </option>
                                        <option value="mastercard">Mastercard
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <label class="col-2 col-form-label">CVV</label>
                                <div class="input-group-icon col-10">
                                    <div class="icon">
                                        <i class="fas fa-caret-right"></i>
                                    </div>
                                    <input type="number" name="cvv" placeholder="CVV"
                                        onfocus="this.placeholder=''" onblur="this.placeholder = 'CVV'" required=""
                                        class="single-input" min="100" max="999" value="">
                                </div>
                            </div>

                            <div class="form-group row justify-content-center p-1">
                                <label class="col-2 col-form-label">Name</label>
                                <div class="input-group-icon col-10">
                                    <div class="icon">
                                        <i class="fas fa-caret-right"></i>
                                    </div>
                                    <input type="text" name="name" placeholder="First Name"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'"
                                        required="" class="single-input" value="">
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <label class="col-2 col-form-label">Surname</label>
                                <div class="input-group-icon col-10">
                                    <div class="icon">
                                        <i class="fas fa-caret-right" aria-hidden="true"></i>
                                    </div>
                                    <input type="text" name="surname" placeholder="Last Name"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'"
                                        required="" class="single-input" value="">
                                </div>
                            </div>

                            <div class="text-center mt-30">
                                <button class="btn btn-success btn-save" type="submit">Save</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

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
<script src="/js/custom.js"></script>
<script src="js/main.js"></script>
<script src="js/owl.carousel.min.js"></script>
@endsection
