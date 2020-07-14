@extends('layouts.app')
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

  @section('content')
            <!-- Start Banner Area -->
            <section class="banner-area organic-breadcrumb">
                <div class="container">
                    <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
                        <div class="col-first">
                            <h1>Login</h1>
                             <nav class="d-flex align-items-center justify-content-start">
                                <a href="/home">Home<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                <a href="/login">Login</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Banner Area -->

		<!-- Start My Account -->
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6">
					<div class="login-form">
						<h3 class="billing-title text-center">Login</h3>
						<p class="text-center mt-80 mb-40">Welcome back! Sign in to your account </p>
                        <form action="{{ route('login') }}" method="POST">

                            @csrf

                            <input type="text"
                            name="email"
                            placeholder="Email*"
                            onfocus="this.placeholder='Email'"
                            onblur="this.placeholder = 'Email*'"
                            required
                            class="common-input mt-20">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <input type="password"
                            placeholder="Password*"
                            name="password"
                            onfocus="this.placeholder=''"
                            onblur="this.placeholder = 'Password*'"
                            required class="common-input mt-20">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror



                            <button class="view-btn color-2 mt-20 w-100"><span>Login</span></button>

							<div class="mt-20 d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center"><input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="pixel-checkbox" id="login-1"><label for="login-1">Remember me</label></div>


                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif


                            </div>

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
            <script src="/js/custom.js"></script>
            <script src="js/main.js"></script>
    @endsection
