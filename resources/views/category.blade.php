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
                                <a href="{{Request::url()}}">@if(!empty($products->first()))
                                        @if(strpos(Request::url(), '/womens')) Women
                                        @elseif(strpos(Request::url(), '/mens')) Men
                                        @else All

                                        @endif
                                        @endif
                                    {{$products->first()->category->name}}</a>
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
								<select class="form-control">
                                    <option value="newst"> <a href="/">Sorting by newest</a></option>
                                    <a><option value="price_up">Sorting by price ↑</option></a>
                                    <a><option value="price_down">Sorting by price ↓</option></a>
								</select>
							</div>
							<div class="pagination">
                                <!-- TO DO  &page or ?page for other filters-->
                            @for ($i = 1; $i<=$products->lastPage(); $i++)
                               <a href="{{$url}}page={{$i}}"
                                   class="{{$products->currentPage() == $i ? 'active' : ''}}">{{$i}}</a>
								    @if($i>3 && $i!=4 && $i<($products->lastPage())-1)
                                    <a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
                                    @endif
                                @endfor
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
                                @for ($i = 1; $i<=$products->lastPage(); $i++)
                                    <a href="{{$url}}page={{$i}}"
                                       class="{{$products->currentPage() == $i ? 'active' : ''}}">{{$i}}</a>
                                    @if($i>3 && $i!=4 && $i<($products->lastPage())-1)
                                        <a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
                                    @endif
                                @endfor
                            </div>
						</div>
						<!-- End Filter Bar -->
					</div>
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
                                @foreach($all_categories= \App\Category::all()->unique('name') as $category )
                                    @php
                                        $all_products = \App\Product::all();
                                        $products_by_name = collect();
                                        if($has_gender){
                                        foreach ($all_products as $single_product){
                                            if($single_product->category->name == $category->name and $single_product->category->gender==$current_gender){
                                                $products_by_name->push($single_product);
                                            }
                                            //tutti products con nome della categoria
                                            $count_by_name = $products_by_name->count();
                                        }
                                        }
                                        else{
                                            foreach ($all_products as $single_product){
                                            if($single_product->category->name == $category->name){
                                                $products_by_name->push($single_product);
                                            }
                                            //tutti products con nome della categoria
                                            $count_by_name = $products_by_name->count();
                                        }
                                        }
                                    @endphp
                                    @if($count_by_name)
                                    <li class="main-nav-list"><a data-toggle="collapse" href="#{{$category->name}}" aria-expanded="false" aria-controls="{{$category->name}}"><span class="lnr lnr-arrow-right"></span>{{$category->name}}
                                            <span class="number">
                                                ({{$count_by_name}})
                                        </span></a>
                                    </li>
                                    @endif
									<ul class="collapse" id="{{$category->name}}"aria-expanded="false" aria-controls="{{$category->name}}">
                                        <!--      -->
                                        @php
                                            $products_by_type = collect();
                                            if($has_gender){
                                                foreach ($all_products as $single_product){
                                                if($single_product->category->type == $category->type and $single_product->category->gender==$current_gender){
                                                    $products_by_type->push($single_product);

                                                }
                                            }
                                                }
                                            else{
                                            foreach ($all_products as $single_product){
                                                if($single_product->category->type == $category->type){
                                                    $products_by_type->push($single_product);

                                                }
                                            }
                                            }
                                        @endphp
                                        <li class="main-nav-list child"><a href="/{{$url_gender}}-clothing/{{$category->name}}" target='_self'>
                                                All {{$category->name}}
                                                <span class="number">
                                                    ({{$count_by_name}})
                                                </span></a></li>
                                      @if($has_gender)
                                        @foreach( $types=\App\Category::all()->where('name',$category->name)->where('gender',$current_gender) as $type_category)
                                            @php
                                                $products_by_type = collect();
                                                foreach ($all_products as $single_product){
                                                    if($single_product->category->type == $type_category->type and $single_product->category->gender==$current_gender){
                                                        $products_by_type->push($single_product);
                                                    }
                                                    $count_by_type = $products_by_type->count();
                                                }

                                            @endphp

                                        @if($count_by_type ) <!-- se non ci sono oggetti nella cateogira non mostra niente -->
                                        <li class="main-nav-list child">
                                            <a href="/{{$url_gender}}-clothing/{{$category->name}}/{{$type_category->type}}" target='_self'>
                                                {{$type_category->type}}
                                                <span class="number">
                                                    ({{$count_by_type}})
                                                </span></a></li>
                                            @endif

                                        @endforeach
                                        @else
                                            @foreach( $types=\App\Category::all()->where('name',$category->name) as $type_category)
                                                @php
                                                    $products_by_type = collect();

                                                        foreach ($all_products as $single_product){
                                                        if($single_product->category->type == $type_category->type){
                                                            $products_by_type->push($single_product);
                                                        }
                                                        $count_by_type = $products_by_type->count();
                                                    }
                                                    $looked=collect();
                                                    $looked->push($type_category->type);
                                                @endphp

                                                @if($count_by_type ) <!-- se non ci sono oggetti nella cateogira non mostra niente -->
                                                <li class="main-nav-list child">
                                                    <a href="/{{$url_gender}}-clothing/{{$category->name}}/{{$type_category->type}}" target='_self'>
                                                        {{$type_category->type}} {{$type_category->gender}}
                                                        <span class="number">
                                                    ({{$count_by_type}})
                                                </span></a></li>
                                                @endif

                                            @endforeach
                                          @endif
                                    </ul>

                                @endforeach
							</ul>
						</div>
						<div class="sidebar-filter mt-50">
                            @php
                            @endphp
                            <form action="{{Request::fullUrl()}}">
                                @csrf

							<div class="top-filter-head">Product Filters</div>
							<div class="common-filter">
                                <label class="head">Price</label>

                                <br>
                                min: <input class="single-input-primary" type="text" name="min_price" value="{{request('min_price')}}">

                                <br>
                                max: <input class="single-input-primary" type="text" name="max_price" value="{{request('max_price')}}">
                                <br>
								<div class="head">Brands</div>
                                @php
                                    $producers=collect();
                                    foreach($products as $product){
                                        $producers->push($product->producer);
                                    }
                                @endphp
									<ul>
                                        @foreach($producers->unique('name') as $producer)
										<li class="filter-list">
                                            <input class="pixel-radio" type="radio" name="brand" value="{{$producer->name}}"><label>{{$producer->name}}</label></li>
                                        @endforeach
									</ul>
							</div>
                            <!--
							<div class="common-filter">
								<div class="head">Color</div>
								<form action="#">
									<ul>
										<li class="filter-list"><input class="pixel-radio" type="radio" id="black" name="color"><label for="black">Black<span>(29)</span></label></li>
									</ul>
								</form>
							</div>
							-->
                                <button class="genric-btn primary-border circle arrow">find</button>
                                <a href="/{{$url_gender}}-clothing"> reset all </a>
                            </form>
                          <!--  <form action="URL::current()">
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
                                <button>find </button>
							</div>
                            </form> -->
						</div>
					</div>
				</div>
			</div>
            @foreach($types=\App\Category::all()->where('name','Abbigliamento')->where('gender',$current_gender) as $type_category)
                {{$type_category->type}}
            @endforeach

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
    <script src="/js/custom.js"></script>
    <script src="/js/main.js"></script>
	@endsection
