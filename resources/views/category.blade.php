@extends('layouts.app')

@section('css')
            <link rel="stylesheet" href="/css/linearicons.css">
            <link rel="stylesheet" href="/css/owl.carousel.css">
            <link rel="stylesheet" href="/css/font-awesome.min.css">
            <link rel="stylesheet" href="/css/nice-select.css">
			<link rel="stylesheet" href="/css/nouislider.min.css">
            <link rel="stylesheet" href="/css/bootstrap.css">
            <link rel="stylesheet" href="/css/main.css">
@endsection

@section('content')
            <!-- Start Banner Area -->
            <section class="banner-area organic-breadcrumb">
                <div class="container">
                    <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
                        <div class="col-first">
                            <h1>Shop Category page</h1>
                             <nav class="d-flex align-items-center justify-content-start">
                                <a href="/">Home<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                <a href="{{Request::url()}}">@if(!empty($products->first()))
                                    {{$products->first()->category->name}} Category</a>
                                 @endif
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Banner Area -->
			<div class="container">
				<div class="row">
					<div class="col-xl-9 col-lg-8 col-md-7">
						<!-- Start Filter Bar -->
						<div class="filter-bar d-flex flex-wrap align-items-center">
							<a href="#" class="grid-btn active"><i class="fa fa-th" aria-hidden="true"></i></a>
							<a href="#" class="list-btn"><i class="fa fa-th-list" aria-hidden="true"></i></a>
							<div class="sorting">
								<select>
									<option value="1">Default sorting</option>
									<option value="1">Default sorting</option>
									<option value="1">Default sorting</option>
								</select>
							</div>
							<div class="sorting mr-auto">
								<select>
									<option value="1">Show 12</option>
									<option value="1">Show 12</option>
									<option value="1">Show 12</option>
								</select>
							</div>
							<div class="pagination">
								<a href="{{$products->previousPageUrl()}}" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
                            @for ($i = 1; $i<=$products->lastPage(); $i++)
                               <a href="{{Request::url()}}?page={{$i}}"
                                   class="{{$products->currentPage() == $i ? 'active' : ''}}">{{$i}}</a>
								    @if($i>3 && $i!=4 && $i<($products->lastPage())-1)
                                    <a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
                                    @endif
                                @endfor
								<a href="{{$products->nextPageUrl()}}" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
							</div>
						</div>
						<!-- End Filter Bar -->
						<!-- Start Best Seller -->
						<section class="lattest-product-area pb-40 category-list">
							<div class="row">
                                @foreach($products as $product)
                                <div class="col-xl-4 col-lg-6 col-md-12 col-sm-6 single-product">
                                    <div class="content">
                                        <div class="content-overlay"></div>
                                        <img class="content-image img-fluid d-block mx-auto" src="{{$product->images->first()->path}}" alt="">
                                        <div class="content-details fadeIn-bottom">
                                            <div class="bottom d-flex align-items-center justify-content-center">
                                                <a href="#"><span class="lnr lnr-heart"></span></a>
                                                <a href="#"><span class="lnr lnr-layers"></span></a>
                                                <a href="#"><span class="lnr lnr-cart"></span></a>
                                                <a href="/{{$product->name}}"><span class="lnr lnr-frame-expand"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="price">
                                        <h5>{{$product->name}}</h5>
                                        <h3>{{$product->price}}€</h3>
                                    </div>
                                </div>
                                @endforeach
								  </div>
						</section>
						<!-- End Best Seller -->
						<!-- Start Filter Bar -->
						<div class="filter-bar d-flex flex-wrap align-items-center">
							<div class="sorting mr-auto">
								<select>
									<option value="1">Show 12</option>
									<option value="1">Show 12</option>
									<option value="1">Show 12</option>
								</select>
							</div>
							<div class="pagination">
								<a href="#" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
                                <a href="{{Request::url()}}?page=1" class="active">1</a>
                                <a href="{{Request::url()}}?page=2">2</a>
								<a href="#">3</a>
								<a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
								<a href="#">6</a>
								<a href="#" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
							</div>
						</div>
						<!-- End Filter Bar -->
					</div>
					<div class="col-xl-3 col-lg-4 col-md-5">
						<div class="sidebar-categories">
							<div class="head">Browse Categories</div>
                            <ul class="main-categories">
                                @foreach($all_categories= \App\Category::all()->unique('name') as $category )
                                <li class="main-nav-list"><a data-toggle="collapse" href="#{{$category->name}}" aria-expanded="false" aria-controls="{{$category->name}}"><span class="lnr lnr-arrow-right"></span>{{$category->name}}<span class="number">(53)</span></a>
									<ul class="collapse" id="{{$category->name}}" data-toggle="collapse" aria-expanded="false" aria-controls="{{$category->name}}">
                                        @foreach($name_categories= \App\Category::where('name',$category->name)->get() as $type_category)
                                        <li class="main-nav-list child"><a href="{{Request::url()}}?name={{$category->name}}&type={{$type_category->type}}" target='_self'>{{$type_category->type}}<span class="number">(13)</span></a></li>
                                        @endforeach
                                    </ul>
								</li>
                                @endforeach
							</ul>
						</div>
						<div class="sidebar-filter mt-50">
							<div class="top-filter-head">Product Filters</div>
							<div class="common-filter">
								<div class="head">Active Filters</div>
								<ul>
									<li class="filter-list"><i class="fa fa-window-close" aria-hidden="true"></i>Gionee (29)</li>
									<li class="filter-list"><i class="fa fa-window-close" aria-hidden="true"></i>Black with red (09)</li>
								</ul>
							</div>
							<div class="common-filter">
								<div class="head">Brands</div>
								<form action="#">
									<ul>
										<li class="filter-list"><input class="pixel-radio" type="radio" id="apple" name="brand"><label for="apple">Apple<span>(29)</span></label></li>
										<li class="filter-list"><input class="pixel-radio" type="radio" id="asus" name="brand"><label for="asus">Asus<span>(29)</span></label></li>
										<li class="filter-list"><input class="pixel-radio" type="radio" id="gionee" name="brand"><label for="gionee">Gionee<span>(19)</span></label></li>
										<li class="filter-list"><input class="pixel-radio" type="radio" id="micromax" name="brand"><label for="micromax">Micromax<span>(19)</span></label></li>
										<li class="filter-list"><input class="pixel-radio" type="radio" id="samsung" name="brand"><label for="samsung">Samsung<span>(19)</span></label></li>
									</ul>
								</form>
							</div>
							<div class="common-filter">
								<div class="head">Color</div>
								<form action="#">
									<ul>
										<li class="filter-list"><input class="pixel-radio" type="radio" id="black" name="color"><label for="black">Black<span>(29)</span></label></li>
										<li class="filter-list"><input class="pixel-radio" type="radio" id="balckleather" name="color"><label for="balckleather">Black Leather<span>(29)</span></label></li>
										<li class="filter-list"><input class="pixel-radio" type="radio" id="blackred" name="color"><label for="blackred">Black with red<span>(19)</span></label></li>
										<li class="filter-list"><input class="pixel-radio" type="radio" id="gold" name="color"><label for="gold">Gold<span>(19)</span></label></li>
										<li class="filter-list"><input class="pixel-radio" type="radio" id="spacegrey" name="color"><label for="spacegrey">Spacegrey<span>(19)</span></label></li>
									</ul>
								</form>
							</div>
							<div class="common-filter">
								<div class="head">Price</div>
								<div class="price-range-area">
									<div id="price-range"></div>
									<div class="value-wrapper d-flex">
										<div class="price">Price:</div>
										<span>$</span><div id="lower-value"></div> <div class="to">to</div>
										<span>$</span><div id="upper-value"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
    @endsection


	@section('js')
	<script src="/js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="/js/vendor/bootstrap.min.js"></script>
	<script src="/js/jquery.ajaxchimp.min.js"></script>
	<script src="/js/jquery.nice-select.min.js"></script>
	<script src="/js/jquery.sticky.js"></script>
		<script src="/js/nouislider.min.js"></script>
	<script src="/js/jquery.magnific-popup.min.js"></script>
	<script src="/js/owl.carousel.min.js"></script>
    <script src="/js/main.js"></script>
	@endsection
