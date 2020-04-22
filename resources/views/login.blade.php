@extends('layout')
@section('css')
            <link rel="stylesheet" href="css/linearicons.css">
            <link rel="stylesheet" href="css/owl.carousel.css">
            <link rel="stylesheet" href="css/font-awesome.min.css">
            <link rel="stylesheet" href="css/nice-select.css">
            <link rel="stylesheet" href="css/ion.rangeSlider.css" />
            <link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
            <link rel="stylesheet" href="css/bootstrap.css">
            <link rel="stylesheet" href="css/main.css">
    @endsection

  @section('area-unica')
            <!-- Start Banner Area -->
            <section class="banner-area organic-breadcrumb">
                <div class="container">
                    <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
                        <div class="col-first">
                            <h1>Shopping Cart</h1>
                             <nav class="d-flex align-items-center justify-content-start">
                                <a href="index.blade.php">Home<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                <a href="cart.blade.php">Shopping Cart</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Banner Area -->

		<!-- Start My Account -->
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="login-form">
						<h3 class="billing-title text-center">Login</h3>
						<p class="text-center mt-80 mb-40">Welcome back! Sign in to your account </p>
						<form action="#">
							<input type="text" placeholder="Username or Email*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Username or Email*'" required class="common-input mt-20">
							<input type="password" placeholder="Password*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Password*'" required class="common-input mt-20">
							<button class="view-btn color-2 mt-20 w-100"><span>Login</span></button>
							<div class="mt-20 d-flex align-items-center justify-content-between">
								<div class="d-flex align-items-center"><input type="checkbox" class="pixel-checkbox" id="login-1"><label for="login-1">Remember me</label></div>
								<a href="#">Lost your password?</a>
							</div>
						</form>
					</div>
				</div>
				<div class="col-md-6">
					<div class="register-form">
						<h3 class="billing-title text-center">Register</h3>
						<p class="text-center mt-40 mb-30">Create your very own account </p>
						<form action="#">
							<input type="text" placeholder="Full name*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Full name*'" required class="common-input mt-20">
							<input type="email" placeholder="Email address*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Email address*'" required class="common-input mt-20">
							<input type="text" placeholder="Phone number*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Phone number*'" required class="common-input mt-20">
							<input type="text" placeholder="Username*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Username*'" required class="common-input mt-20">
							<input type="password" placeholder="Password*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Password*'" required class="common-input mt-20">
							<button class="view-btn color-2 mt-20 w-100"><span>Register</span></button>
						</form>
					</div>
				</div>
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
            <script src="js/main.js"></script>
    @endsection
