@extends('layouts.app')

{{-- @section('css')
            <link rel="stylesheet" href="/css/linearicons.css">
            <link rel="stylesheet" href="/css/owl.carousel.css">
            <link rel="stylesheet" href="/css/font-awesome.min.css">
            <link rel="stylesheet" href="/css/nice-select.css">
			<link rel="stylesheet" href="/css/nouislider.min.css">
            <link rel="stylesheet" href="/css/bootstrap.css">
            <link rel="stylesheet" href="/css/main.css">
@endsection --}}

@section('content')
            <!-- Start Banner Area -->
            <section class="banner-area organic-breadcrumb">
                <div class="container">
                    <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
                        <div class="col-first">
                            <h1>Shop Category page</h1>
                             <nav class="d-flex align-items-center justify-content-start">
                                <a href="/">Home<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                <a href="{{Request::url()}}">@if(!$error)
                                        @if(strpos(Request::url(), '/womens')) Women
                                        @elseif(strpos(Request::url(), '/mens')) Men
                                        @else All

                                        @endif
                                        @endif
                                    @if($error) Empty @else {{$products->first()->category->name}} @endif</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Banner Area -->
			<div class="container">
				<div class="row">
                    @if($error)
                        <div class="col-xl-9 col-lg-8 col-md-7">
                            <p class="text-center">{{ $error }}</p>
                        </div>
                    @else
					<div class="col-xl-9 col-lg-8 col-md-7">
						<!-- Start Filter Bar -->
                        @php
                            //gestore url
                            $url='';
                               $brand = request('brand');
                                 $max_price = request('max_price');
                                 $min_price = request('min_price');
                           /* if(strpos(Request::fullUrl(), "page=")){
                                 $url= Request::url().'?min_price='.$min_price.'&max_price='.$max_price.'&brand='.$brand.'&';

                            }
                            else{ */
                                 $url= Request::url().'?min_price='.$min_price.'&max_price='.$max_price.'&brand='.$brand.'&';
                            //}

                        @endphp
						<div class="filter-bar d-flex flex-wrap align-items-center">
							<div class="sorting">
                                <div class="dropdown show">
                                    <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Sort by
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                      <a class="dropdown-item" href="#">Sorting by newest</a>
                                      <a class="dropdown-item" href="{{ Request::url().'?orderBy=price&asc' }}">Sorting by price ↑</a>
                                      <a class="dropdown-item" href="{{ Request::url().'?orderBy=price&desc' }}">Sorting by price ↓</a>
                                    </div>
                                  </div>
							</div>
							<div class="pagination">
                                <!-- TO DO  &page or ?page for other filters-->
                                @if(!$error)
                            @for ($i = 1; $i<=$products->lastPage(); $i++)
                               <a href="{{$url}}page={{$i}}"
                                   class="{{$products->currentPage() == $i ? 'active' : ''}}">{{$i}}</a>
								    @if($i>3 && $i!=4 && $i<($products->lastPage())-1)
                                    <a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
                                    @endif
                                @endfor
                                @endif
							</div>
						</div>
						<!-- End Filter Bar -->
						<!-- Start Best Seller -->
						<section class="lattest-product-area pb-40 category-list">
							<div class="row">
                                @foreach($products as $product)
                            <div class="col-xl-4 col-lg-6 col-md-12 col-sm-6 single-product" >
                                    <div class="content">
                                        <div class="content-overlay"></div>
                                        <img class="content-image img-fluid d-block mx-auto" src="{{$product->images->first()->path}}" alt="">
                                        <div class="content-details fadeIn-bottom">
                                            <div class="bottom d-flex align-items-center justify-content-center">
                                                <a href="" class="wishlist" data-id="{{$product->id}}"><span class="lnr lnr-heart"></span></a>
                                                <a href="/{{$product->name}}"><span class="lnr lnr-frame-expand"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="price">
                                        <div>
                                            <h5>{{$product->name}}</h5>
                                            <p id="description-tab"> {{$product->producer->name}}</p>
                                        </div>
                                        <h3>{{$product->price}}€</h3>

                                    </div>
                                </div>
                                @endforeach
								  </div>
						</section>
						<!-- End Best Seller -->
						<!-- Start Filter Bar -->
						<div class="filter-bar d-flex flex-wrap align-items-center">
                            <div class="pagination">
                                @if(!$error)
                                @for ($i = 1; $i<=$products->lastPage(); $i++)
                                    <a href="{{$url}}page={{$i}}"
                                       class="{{$products->currentPage() == $i ? 'active' : ''}}">{{$i}}</a>
                                    @if($i>3 && $i!=4 && $i<($products->lastPage())-1)
                                        <a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
                                    @endif
                                @endfor
                                @endif
                            </div>
						</div>
						<!-- End Filter Bar -->
					</div>
                    @endif
					<div class="col-xl-3 col-lg-4 col-md-5">
						<div class="sidebar-categories">
							<div class="head">Browse Categories</div>
                            <ul class="main-categories">
                                @php
                                if(strpos(Request::url(), "all-clothing")){
                                $has_gender= 0;
                                $current_gender=null;
                                $url_gender='all';
                                }
                                elseif(strpos(Request::url(), "womens-clothing")){
                                         $has_gender=1;
                                         $current_gender='female';
                                }
                                elseif(strpos(Request::url(), "mens-clothing")){
                                        $has_gender=1;
                                        $current_gender='male';
                                }
                                     $g = new \App\Helpers\General\GenderHelper();
                                         $url_gender=$g->re_transform($current_gender);
                                @endphp
                                @foreach($macro_categories as $macro_category)
                                    @if($macro_category->count)
                                        <li class="main-nav-list">
                                            <a data-toggle="collapse" href="#{{$macro_category->name}}" aria-expanded="false" aria-controls="{{$macro_category->name}}">
                                                <span class="lnr lnr-arrow-right">
                                                </span>
                                                {{$macro_category->name}}
                                            </a>
									<ul class="collapse" id="{{$macro_category->name}}"aria-expanded="false" aria-controls="{{$macro_category->name}}">
                                        <li class="main-nav-list child"><a href="/{{ $url_gender }}-clothing/{{$macro_category->name}}" target='_self'>
                                                All {{$macro_category->name}}
                                                <span class="number">
                                                    ({{$macro_category->count}})
                                                </span>
                                            </a>
                                        </li>
                                        @foreach($macro_category->sub_categories as $category)
                                            @if($category->count)
                                        <li class="main-nav-list child">
                                            <a href="/{{$url_gender}}-clothing/{{$category->name}}/{{$category->type}}" target='_self'>
                                                {{$category->type}}
                                                <span class="number">
                                                    ({{$category->count}})
                                                </span>
                                            </a>
                                        </li>
                                            @endif
                                        @endforeach
                                        @endif
                                        @endforeach
                                    </ul>
							</ul>
						</div>
						<div class="sidebar-filter mt-50">
                            <form action="{{Request::fullUrl()}}">
                                @csrf

							<div class="top-filter-head">Product Filters</div>
							<div class="common-filter">
                                <label class="head">Price</label>

                                <br>
                                Min: <input class="single-input-primary" type="text" name="min_price" value="{{request('min_price')}}">

                                <br>
                                Max: <input class="single-input-primary" type="text" name="max_price" value="{{request('max_price')}}">
                                <br>
								<div class="head">Brands</div>
									<ul>
                                        @foreach($producers->unique('name') as $producer)
                                            @if(count($producer->products) != 0)
										        <li class="filter-list">
                                                <input class="pixel-radio" type="radio" name="brand" value="{{$producer->name}}"><label>{{$producer->name}}</label></li>
                                            @endif
                                        @endforeach
									</ul>
							</div>
                                <button class="genric-btn primary-border circle arrow">Find</button>
                                <a href="/{{$url_gender}}-clothing"> Reset filters </a>
                            </form>
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
    <script src="/js/owl.carousel.js"></script>
    <script src="/js/custom.js"></script>
    <script src="/js/main.js"></script>
	@endsection
