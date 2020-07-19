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
                            <h1>Order Confermation</h1>
                             <nav class="d-flex align-items-center justify-content-start">
                                <a href="home.blade.php">Home<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                <a href="confermation.blade.php">Confermation</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Banner Area -->

		<!-- Start Checkout Area -->
		@if($error)
            <div class="container">
                <p class="text-center">{{ $error }}</p>
            </div>
            @else
            <div class="container">
			<p class="text-center">Thank you. Your order has been received.</p>
			<div class="row mt-50">
				<div class="col-md-4">
					<h3 class="billing-title mt-20 pl-15">Order Info</h3>
					<table class="order-rable">
						<tr>
							<td>Order number:</td>
							<td> {{ $order->id }}</td>
						</tr>
						<tr>
							<td>Date:</td>
							<td> {{ $order->created_at }}</td>
						</tr>
						<tr>
							<td>Total:</td>
							<td> {{ $order->amount }}€</td>
						</tr>
						<tr>
							<td>Payment method:</td>
							<td> @if($order->card_id)
                                    Credit Card
                                @endif
                            </td>
						</tr>
					</table>
				</div>
				<div class="col-md-4">
					<h3 class="billing-title mt-20 pl-15">Billing Address</h3>
					<table class="order-rable">
						<tr>
							<td>Street:</td>
							<td> {{ $billing_address->address . ', ' . $billing_address-> address_additional }}</td>
						</tr>
						<tr>
							<td>City:</td>
							<td> {{ $billing_address->city }}</td>
						</tr>
						<tr>
							<td>Country:</td>
							<td> {{ $billing_address->country }}</td>
						</tr>
						<tr>
							<td>Postcode:</td>
							<td> {{ $billing_address->postal_code }}</td>
						</tr>
					</table>
				</div>
				<div class="col-md-4">
					<h3 class="billing-title mt-20 pl-15">Shipping Address</h3>
					<table class="order-rable">
						<tr>
							<td>Street:</td>
							<td> {{ $shipping_address->address . ', ' . $shipping_address-> address_additional }}</td>
						</tr>
						<tr>
							<td>City:</td>
							<td> {{ $shipping_address->city }}</td>
						</tr>
						<tr>
							<td>Country:</td>
							<td> {{ $shipping_address->country }}</td>
						</tr>
						<tr>
							<td>Postcode:</td>
							<td> {{ $shipping_address->postal_code }}</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<!-- End Checkout Area -->
		<!-- Start Billing Details Form -->
		<div class="container">
			<div class="billing-form">
				<div class="row">
					<div class="col-12">
						<div class="order-wrapper mt-50">
							<h3 class="billing-title mb-10">Your Order</h3>
							<div class="order-list">
								<div class="list-row d-flex justify-content-between">
									<div>Product</div>
                                    <div>Quantity</div>
									<div>Total</div>
								</div>
                                @foreach($order_details as $order_product)
								<div class="list-row d-flex justify-content-between">
									<div>{{ App\Product::find($order_product->product_id)->name }}</div>
									<div>x{{ $order_product->quantity }}</div>
									<div>{{ App\Product::find($order_product->product_id)->price * $order_product->quantity }}€</div>
								</div>
                                @endforeach
								<div class="list-row d-flex justify-content-between">
									<h6>Subtotal</h6>
									<div>{{ $order->amount - 10 }}€</div>
								</div>
								<div class="list-row d-flex justify-content-between">
									<h6>Shipping</h6>
									<div>Flat rate: 10.00€</div>
								</div>
								<div class="list-row d-flex justify-content-between">
									<h6>Total</h6>
									<div class="total">{{ $order->amount }}€</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Billing Details Form -->
        @endif
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
