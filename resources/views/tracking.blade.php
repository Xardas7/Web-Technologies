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

		<!-- Start My Account -->
		<div class="container">
			<div class="order-tracking">
				<p>To track your order please enter your Order ID in the box below and press the "Track" button. This was given to you on your receipt and in the confirmation email you should have received.</p>
				<form action="#">
					<input type="text" placeholder="Order ID" onfocus="this.placeholder=''" onblur="this.placeholder = 'Order ID'" required class="common-input mt-20">
					<input type="text" placeholder="Billing Email Address" onfocus="this.placeholder=''" onblur="this.placeholder = 'Billing Email Address'" required class="common-input mt-20">
					<button class="view-btn color-2 mt-20"><span>Track Order</span></button>
				</form>
			</div>
		</div>
		<!-- End My Account -->
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
