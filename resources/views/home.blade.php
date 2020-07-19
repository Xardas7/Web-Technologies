@extends('layouts.app')
{{-- @section('css')
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/nice-select.css">
		    <link rel="stylesheet" href="css/ion.rangeSlider.css" />
		    <link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/main.css">
			<link rel="stylesheet" href="css/app.css">
@endsection --}}

@section('content')
			<!-- start banner Area -->
			<section class="banner-area relative" id="home">
				<div class="container-fluid">
					<div class="row fullscreen align-items-center justify-content-center">
						<div class="col-lg-6 col-md-12 d-flex align-self-end img-right no-padding">
							<img class="img-fluid" src="/img/header-img.png" alt="">
						</div>
						<div class="banner-content col-lg-6 col-md-12">
							<h1 class="title-top"><span>Flat</span> 75%Off</h1>
							<h1 class="text-uppercase">
								It’s Happening <br>
								this Season!
							</h1>
							<button class="primary-btn text-uppercase"><a href="/all-clothing">Purchase Now</a></button>
						</div>
					</div>
				</div>
			</section>
			<!-- End banner Area -->

			<!-- Start category Area -->
			<section class="category-area section-gap section-gap" id="catagory">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-40">
							<div class="title text-center">
								<h1 class="mb-10">Shop for Different Categories</h1>
								<p>Who are in extremely love with eco friendly system.</p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-8 col-md-8 mb-10">
							<div class="row category-bottom">
								<div class="col-lg-6 col-md-6 mb-30">
									<div class="content">
									    <a href="/womens-clothing">
									      <div class="content-overlay"></div>
									  		 <img class="content-image img-fluid d-block mx-auto" src="/img/c1.jpg" alt="">
									      <div class="content-details fadeIn-bottom">
									        <h3 class="content-title">Women</h3>
									      </div>
									    </a>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 mb-30">
									<div class="content">
									    <a href="/all-clothing">
									      <div class="content-overlay"></div>
									  		 <img class="content-image img-fluid d-block mx-auto" src="/img/c2.jpg" alt="">
									      <div class="content-details fadeIn-bottom">
									        <h3 class="content-title">All Products</h3>
									      </div>
									    </a>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="content">
										<a href="">
									      <div class="content-overlay"></div>
									  		 <img class="content-image img-fluid d-block mx-auto" src="/img/c3.jpg" alt="">
									      <div class="content-details fadeIn-bottom">
									        <h3 class="content-title">Shop Now</h3>
									      </div>
									    </a>
									</div>
							  	</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 mb-10">
						  <div class="content">
						    <a href="/mens-clothing">
						      <div class="content-overlay"></div>
						  		 <img class="content-image img-fluid d-block mx-auto" src="/img/c4.jpg" alt="">
						      <div class="content-details fadeIn-bottom">
						        <h3 class="content-title">Men</h3>
						      </div>
						    </a>
						  </div>
						</div>
					</div>
				</div>
			</section>
			<!-- End category Area -->

			<!-- Start men-product Area -->
			<section class="men-product-area section-gap relative" id="men">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-40">
							<div class="title text-center">
								<h1 class="text-white mb-10">New realeased Products for Men</h1>
								<p class="text-white">Who are in extremely love with eco friendly system.</p>
							</div>
						</div>
					</div>
					<div class="row">
                        @php
                                $products_col = \App\Product::all()->sortByDesc('create_at');
                                $products=collect();
                                $i=0;
                                foreach ($products_col as $product_obj){
                                    if ($product_obj->category->gender == 'male' && $i<4) {
                                        $products->push($product_obj);
                                        $i++;
                                    }
                                }
                             @endphp
                        @foreach($products as $product)
						<div class="col-lg-3 col-md-6 single-product">
							<a class="content" href="/{{$product->name}}">
								<div class="content-overlay"></div>
								<img class="content-image img-fluid d-block mx-auto"
									src="{{ Storage::exists($product->images->first()->path) ? asset("storage/".$product->images->first()->path) :  $product->images->first()->path}}" alt="">
	
							</a>
							<div class="price">
								<div>
									<a href="/{{$product->name}}" class="product_name">
										<h5 class="text-white">{{$product->name}}</h5>
									</a>
									<p class="text-white" id="description-tab"> {{$product->producer->name}}</p>
								</div>
								<h3 class="text-white">{{$product->price}}€</h3>
	
							</div>
						</div>
                        @endforeach
					</div>
				</div>
			</section>
			<!-- End men-product Area -->

			<!-- Start women-product Area -->
            @php
                $products=collect();
                $i=0;
                foreach ($products_col as $product_obj){
                    if ($product_obj->category->gender == 'female' && $i<4) {
                        $products->push($product_obj);
                        $i++;
                    }
                }
            @endphp
			<section class="women-product-area section-gap" id="women">
				<div class="container">
					<div class="countdown-content pb-40">
						<div class="title text-center">
							<h1 class="mb-10">New realeased Products for Women</h1>
						<p>Who are in extremely love with eco friendly system.</p>
						</div>
					</div>
					<div class="row">
                        @foreach($products as $product)
						<div class="col-lg-3 col-md-6 single-product">
							<a class="content" href="/{{$product->name}}">
								<div class="content-overlay"></div>
								{{-- <img class="content-image img-fluid d-block mx-auto"
									src="{{ Storage::exists($product->images->first()->path) ? asset("storage/".$product->images->first()->path) :  $product->images->first()->path}}" alt=""> --}}
	
							</a>
							<div class="price">
								<div>
									<a href="/{{$product->name}}" class="product_name">
										<h5>{{$product->name}}  {{$product->images->first()}}</h5>
									</a>
									<p id="description-tab"> {{$product->producer->name}}</p>
								</div>
								<h3>{{$product->price}}€</h3>
	
							</div>
						</div>
                        @endforeach
					</div>
				</div>
			</section>
			<!-- End women-product Area -->

			<!-- Start Count Down Area -->
			<div class="countdown-area">
				<div class="container">
					<div class="countdown-content">
						<div class="title text-center">
							<h1 class="mb-10">Exclusive Hot Deal Ends in:</h1>
							<p>Who are in extremely love with eco friendly system.</p>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-4 col-lg-4"></div>
						<div class="col-xl-6 col-lg-7">
							<div class="countdown d-flex justify-content-center justify-content-md-end" id="js-countdown">
								<div class="countdown-item">
									<div class="countdown-timer js-countdown-days time" aria-labelledby="day-countdown">

									</div>

									<div class="countdown-label" id="day-countdown">Days</div>
								</div>

								<div class="countdown-item">
									<div class="countdown-timer js-countdown-hours" aria-labelledby="hour-countdown">

									</div>

									<div class="countdown-label" id="hour-countdown">Hours</div>
								</div>

								<div class="countdown-item">
									<div class="countdown-timer js-countdown-minutes" aria-labelledby="minute-countdown">

									</div>

									<div class="countdown-label" id="minute-countdown">Minutes</div>
								</div>

								<div class="countdown-item">
									<div class="countdown-timer js-countdown-seconds" aria-labelledby="second-countdown">

									</div>

									<div class="countdown-label text" id="second-countdown">Seconds</div>
								</div>
								<a href="/all-clothing" class="view-btn primary-btn2"><span>Shop Now</span></a>
								<img src="img/cd.png" class="img-fluid cd-img" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Count Down Area -->
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
