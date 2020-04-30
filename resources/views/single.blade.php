@extends('layouts.app')
@section('css')
            <link rel="stylesheet" href="/css/linearicons.css">
            <link rel="stylesheet" href="/css/owl.carousel.css">
            <link rel="stylesheet" href="/css/font-awesome.min.css">
            <link rel="stylesheet" href="/css/nice-select.css">
            <link rel="stylesheet" href="/css/ion.rangeSlider.css" />
            <link rel="stylesheet" href="/css/ion.rangeSlider.skinFlat.css" />
            <link rel="stylesheet" href="/css/bootstrap.css">
            <link rel="stylesheet" href="/css/main.css">
 @endsection

@section('content')
            <!-- Start Banner Area -->
            <section class="banner-area organic-breadcrumb">
                <div class="container">
                    <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
                        <div class="col-first">
                            <h1>Single Product Page</h1>
                             <nav class="d-flex align-items-center justify-content-start">
                                <a href="/">Home<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                <a href="/products">Enjoy our products</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Banner Area -->

            <!-- Start Product Details -->
            <div class="container">
                <div class="product-quick-view">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="quick-view-carousel-details">
                                @foreach($product->images as $image)
                                <div class="item" style="background:
                                    url({{$image->path}});">
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="quick-view-content">
                                <div class="top">
                                    <h3 class="head">{{$product->name}}</h3>
                                    <div class="price d-flex align-items-center"><span class="lnr lnr-tag"></span> <span class="ml-10">{{$product->price}}€</span></div>
                                    <div class="category">
                                        Category: <span>
                                        {{$product->category->name}}
                                            {{$product->category->type}}
                                        </span></div>
                                    <div class="available">Availibility: <span>{{$product->detail->quantity}} pieces </span></div>
                                </div>
                                <div class="middle">
                                    <p class="content">{{$product->description}}</p>
                                </div>
                                <div >
                                    <div class="quantity-container d-flex align-items-center mt-15">
                                        Quantity:
                                        <input type="text" class="quantity-amount ml-15" value="1" />
                                        <div class="arrow-btn d-inline-flex flex-column">
                                            <button class="increase arrow" type="button" title="Increase Quantity"><span class="lnr lnr-chevron-up"></span></button>
                                            <button class="decrease arrow" type="button" title="Decrease Quantity"><span class="lnr lnr-chevron-down"></span></button>
                                        </div>

                                    </div>
                                    <div class="d-flex mt-20">
                                        <a href="#" class="view-btn color-2"><span>Add to Cart</span></a>
                                        <a href="#" class="like-btn"><span class="lnr lnr-heart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="details-tab-navigation d-flex justify-content-center mt-30">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li>
                            <a class="nav-link" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-expanded="true">Description</a>
                        </li>
                        <li>
                            <a class="nav-link" id="specification-tab" data-toggle="tab" href="#specification" role="tab" aria-controls="specification">Specification</a>
                        </li>
                        <li>
                            <a class="nav-link active" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews">Reviews</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade" id="description" role="tabpanel" aria-labelledby="description">
                        <div class="description">
                            {{$product->description}}
                        </div>
                    </div>
                    <div class="tab-pane fade" id="specification" role="tabpanel" aria-labelledby="specification">
                        <div class="specification-table">
                            <div class="single-row">
                                <span>Material</span>
                                <span>{{$product->detail->material}}</span>
                            </div>
                            <div class="single-row">
                                <span>Composition</span>
                                <span>{{$product->detail->composition}}</span>
                            </div>
                            <div class="single-row">
                                <span>Width</span>
                                <span>{{$product->detail->width}}</span>
                            </div>
                            <div class="single-row">
                                <span>Height</span>
                                <span>{{$product->detail->height}}</span>
                            </div>
                            <div class="single-row">
                                <span>Depth</span>
                                <span>{{$product->detail->depth}}</span>
                            </div>
                            <div class="single-row">
                                <span>Weight</span>
                                <span>{{$product->detail->weight}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show active" id="reviews" role="tabpanel" aria-labelledby="reviews">
                        <div class="review-wrapper">
                            <div class="row">
                                <div @auth class="col-lg-6" @endauth>
                                    <div class="review-stat d-flex align-items-center flex-wrap">
                                        <div class="review-overall">
                                            <h3>Overall</h3>
                                            <div class="main-review">4.0</div>
                                            <span>(03 Reviews)</span>
                                        </div>
                                        <div class="review-count">
                                            <h4>Based on 3 Reviews</h4>
                                            <div class="single-review-count d-flex align-items-center">
                                                <span>5 Star</span>
                                                <div class="total-star five-star d-flex align-items-center">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                                <span>01</span>
                                            </div>
                                            <div class="single-review-count d-flex align-items-center">
                                                <span>4 Star</span>
                                                <div class="total-star four-star d-flex align-items-center">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                                <span>01</span>
                                            </div>
                                            <div class="single-review-count d-flex align-items-center">
                                                <span>3 Star</span>
                                                <div class="total-star three-star d-flex align-items-center">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                                <span>01</span>
                                            </div>
                                            <div class="single-review-count d-flex align-items-center">
                                                <span>2 Star</span>
                                                <div class="total-star two-star d-flex align-items-center">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                                <span>00</span>
                                            </div>
                                            <div class="single-review-count d-flex align-items-center">
                                                <span>1 Star</span>
                                                <div class="total-star one-star d-flex align-items-center">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                                <span>00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- total comments -->
                                    <div class="total-comment">
                                        @foreach($product->comments as $comment)
                                        <div class="single-comment">
                                            <div class="user-details d-flex align-items-center">
                                                <img src="https://www.croptecshow.com/wp-content/uploads/2017/04/guest-avatar-250x250px.png" class="img-fluid" alt="">
                                                <div class="user-name">
                                                    <h5>{{$comment->user->name}} {{$comment->user->surname}}</h5>
                                                    <div class="total-star {{$comment->vote}}-star d-flex align-items-center">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="user-comment">
                                                {{$comment->content}}
                                            </p>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @auth
                                <div class="col-lg-6">
                                    <div class="add-review">
                                        <h3>Add a Review</h3>
                                        <div class="single-review-count mb-15 d-flex align-items-center">
                                            <span>Your Rating:</span>
                                            <div class="total-star five-star d-flex align-items-center">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </div>
                                            <span>Outstanding</span>
                                        </div>
                                        <form action="#" class="main-form">
                                            <input type="text" placeholder="Your Full name" onfocus="this.placeholder=''" onblur="this.placeholder = 'Your Full name'" required class="common-input">
                                            <input type="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" placeholder="Email Address" onfocus="this.placeholder=''" onblur="this.placeholder = 'Email Address'" required class="common-input">
                                            <input type="text" placeholder="Phone Number" onfocus="this.placeholder=''" onblur="this.placeholder = 'Phone Number'" required class="common-input">
                                            <textarea placeholder="Review" onfocus="this.placeholder=''" onblur="this.placeholder = 'Review'" required class="common-textarea"></textarea>
                                            <button class="view-btn color-2"><span>Submit Now</span></button>
                                        </form>
                                    </div>
                                </div>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Product Details -->
@endsection


@section('js')
            <script src="/js/vendor/jquery-2.2.4.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
            <script src="/js/vendor/bootstrap.min.js"></script>
            <script src="/js/jquery.ajaxchimp.min.js"></script>
            <script src="/js/jquery.nice-select.min.js"></script>
            <script src="/js/jquery.sticky.js"></script>
            <script src="/js/ion.rangeSlider.js"></script>
            <script src="/js/jquery.magnific-popup.min.js"></script>
            <script src="/js/owl.carousel.min.js"></script>
            <script src="/js/main.js"></script>
@endsection
