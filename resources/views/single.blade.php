@extends('layouts.app')
{{-- @section('css')
            <link rel="stylesheet" href="/css/linearicons.css">
            <link rel="stylesheet" href="/css/owl.carousel.css">
            <link rel="stylesheet" href="/css/font-awesome.min.css">
            <link rel="stylesheet" href="/css/nice-select.css">
            <link rel="stylesheet" href="/css/ion.rangeSlider.css" />
            <link rel="stylesheet" href="/css/ion.rangeSlider.skinFlat.css" />
            <link rel="stylesheet" href="/css/bootstrap.css">
            <link rel="stylesheet" href="/css/main.css">
 @endsection --}}

@section('content')
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
            <div class="col-first">
                <h1>{{$product->name}}</h1>
                <nav class="d-flex align-items-center justify-content-start">
                    <a href="/">Home<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                    <a href="/products">{{$product->name}}</a>
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
                <div class="owl-carousel owl-theme">
                    @if($product==null ))
                    @else
                    @if($product->images==null )
                    <div class="item"
                        style="background:
                                        url(https://cdn.tobi.com/product_images/lg/1/plum-maddie-asymmetrical-bodycon-dress.jpg);">
                    </div>
                    @else
                    @foreach($product->images as $image)
                    <div class="item">
                        <!-- style="background: url($image->path);-->
                    <img src="{{ Storage::exists($product->images->first()->path) ? asset("storage/".$image->path) :  $image->path}}" />
                    </div>
                    @endforeach
                    @endif
                    @endif
                </div>
            </div>
            <div class="col-lg-6">
                <div class="quick-view-content">
                    <div class="top">
                        <h3 class="head">{{$product->name}}</h3>
                        <div class="price d-flex align-items-center"><span class="lnr lnr-tag"></span> <span
                                class="ml-10">{{$product->price}}€</span></div>
                        <div class="category">
                            Category: <span>
                                @if($product->category==null)
                                No category yet!
                                @else
                                @if($product->category->gender=='male')
                                <a href="/mens-clothing/{{$product->category->name}}/{{$product->category->type}}">
                                    {{$product->category->name}}
                                    {{$product->category->type}}
                                </a>
                                @endif
                                @if($product->category->gender=='female')
                                <a href="/womens-clothing/{{$product->category->name}}/{{$product->category->type}}">
                                    {{$product->category->name}}
                                    {{$product->category->type}}
                                </a>
                                @endif
                                @endif
                            </span></div>
                        <div class="available">Availibility: <span>
                                @if($product->details->quantity==0)
                                Not Available
                                @else
                                In Stock
                                @endif
                            </span></div>
                    </div>
                    <div class="middle">
                        <p class="content">{!! $product->description !!}</p>
                    </div>
                    <div>
                        <div class="quantity-container row align-items-center mt-15">
                            <div class="col-2">Quantity:</div>
                            <input type="text" class=" col-1 form-control quantity-amount ml-15" id="quantity"
                                value="1" />
                            <div class="arrow-btn d-inline-flex flex-column col-1">
                                <button class="increase arrow" type="button" title="Increase Quantity"><span
                                        class="lnr lnr-chevron-up"></span></button>
                                <button class="decrease arrow" type="button" title="Decrease Quantity"><span
                                        class="lnr lnr-chevron-down"></span></button>
                            </div>
                        </div>

                        <div class="row align-items-center mt-15">
                            <div class="col-2">Size:</div>
                            @if($sizes)
                            <select id="size" class="form-control ml-15 col-2">
                                @foreach($sizes as $size)
                                <option value={{$size->size}}>{{$size->size}}</option>
                                @endforeach
                            </select>
                            @else
                            This product has an unique size
                            @endif
                        </div>
                        <div class="d-flex mt-20">
                            @auth
                            <a href="" class="view-btn color-2 addCart"><span>Add to Cart</span></a>
                            <a href="" class="like-btn"><span class="lnr lnr-heart"></span></a>
                            @else
                            <a href="/login" class="view-btn color-2"><span>Add to Cart</span></a>
                            <a href="/login" class="like-btn"><span class="lnr lnr-heart"></span></a>
                            @endauth
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
                <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab"
                    aria-controls="description" aria-expanded="true" aria-selected="true">Description</a>
            </li>
            <li>
                <a class="nav-link" id="specification-tab" data-toggle="tab" href="#specification" role="tab"
                    aria-controls="specification" aria-selected="false">Specification</a>
            </li>
            <li>
                <a class="nav-link " id="reviews-tab" data-toggle="tab" href="#reviews" role="tab"
                    aria-controls="reviews" aria-selected="false">Reviews</a>
            </li>
        </ul>
    </div>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
            <div class="description">
                {!! $product->description !!}
            </div>
        </div>
        <div class="tab-pane fade" id="specification" role="tabpanel" aria-labelledby="specification-tab">
            <div class="specification-table">
                @if($product->details ==null)
                nothing here
                @else
                <div class="single-row">
                    <span>Material</span>
                    <span>{{$product->details->material}}</span>
                </div>
                <div class="single-row">
                    <span>Composition</span>
                    <span>{{$product->details->composition}}</span>
                </div>
                <div class="single-row">
                    <span>Width</span>
                    <span>{{$product->details->width}}</span>
                </div>
                <div class="single-row">
                    <span>Height</span>
                    <span>{{$product->details->height}}</span>
                </div>
                <div class="single-row">
                    <span>Depth</span>
                    <span>{{$product->details->depth}}</span>
                </div>
                <div class="single-row">
                    <span>Weight</span>
                    <span>{{$product->details->weight}}</span>
                </div>
            </div>
            @endif
        </div>
        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
            <div class="review-wrapper">
                <div class="row">
                    <div @auth class="col-lg-6" @endauth>
                        @php $total = 0; $one=0; $two=0; $three=0; $four=0; $five=0; @endphp
                        @foreach($product->comments as $comment)
                        @if($comment->vote=='one') @php $total+=1; $one+=1; @endphp @endif
                        @if($comment->vote=='two') @php $total+=2; $two+=1; @endphp @endif
                        @if($comment->vote=='three') @php $total+=3; $three+=1; @endphp @endif
                        @if($comment->vote=='four') @php $total+=4; $four+=1; @endphp @endif
                        @if($comment->vote=='five') @php $total+=5; $five+=1; @endphp @endif
                        @endforeach
                        <div class="review-stat d-flex align-items-center flex-wrap">
                            <div class="review-overall">
                                <h3>Overall</h3>
                                <div class="main-review">@if($product->comments->count()==0) 0 @else
                                    {{ number_format((float)$total/$product->comments->count(), 2, '.', '')}} @endif
                                </div>
                                <span>({{$product->comments->count()}} Reviews)</span>
                            </div>
                            <div class="review-count">
                                <h4>Based on {{$product->comments->count()}} Reviews</h4>
                                <div class="single-review-count d-flex align-items-center">
                                    <span>5 Star</span>
                                    <div class="total-star five-star d-flex align-items-center">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <span>
                                        {{$five}}
                                    </span>
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
                                    <span>
                                        {{$four}}
                                    </span>
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
                                    <span>{{$three}}</span>
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
                                    <span>
                                        {{$two}}
                                    </span>
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
                                    <span>{{$one}}</span>
                                </div>
                            </div>
                        </div>
                        <!-- total comments -->
                        <div class="total-comment">
                            @foreach($product->comments as $comment)
                            <div class="single-comment">
                                <div class="user-details d-flex align-items-center">
                                <img src="{{ Storage::exists($comment->user->avatar->path) ? asset("storage/".$comment->user->avatar->path) :  "/images/default-avatar/guest-avatar.png"}}"
                                        class="img-fluid" alt="">
                                    <div class="user-name">
                                        <h5>{{$comment->user->name}} {{$comment->user->surname}}</h5>
                                        <div class="total-star {{$comment->vote}}-star d-flex align-items-center">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </div>
                                        <div class="d-flex inline-flex">
                                            <small>{{count($comment->likes)}}</small>
                                            <div class="ml-2"><i class="far fa-thumbs-up {{$comment->likes()->where('user_id', Auth::id())->first() != null ? 'dislike-button' : 'like-button'}}" data-id="{{$comment->id}}"></i></div>
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
                                <div class="total-star five-star d-flex align-items-center" id="commento">
                                    <i class="fa fa-star 1" aria-hidden="true"></i>
                                    <i class="fa fa-star 2" aria-hidden="true"></i>
                                    <i class="fa fa-star 3" aria-hidden="true"></i>
                                    <i class="fa fa-star 4" aria-hidden="true"></i>
                                    <i class="fa fa-star 5" aria-hidden="true"></i>
                                </div>
                                <span>Outstanding</span>
                            </div>
                            <form action="#" class="main-form">
                                @csrf
                                <textarea placeholder="Review" onfocus="this.placeholder=''"
                                    onblur="this.placeholder = 'Review'" required class="common-textarea"
                                    name="content"></textarea>
                                <input type="text" name="product_id" hidden value="{{$product->id}}" />
                                <button type="submit" class="view-btn color-2" id="inviaCommento"><span>Submit
                                        Now</span></button>
                            </form>
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
    integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
</script>
<script src="/js/vendor/bootstrap.min.js"></script>
<script src="/js/jquery.ajaxchimp.min.js"></script>
<script src="/js/jquery.nice-select.min.js"></script>
<script src="/js/jquery.sticky.js"></script>
<script src="/js/ion.rangeSlider.js"></script>
<script src="/js/jquery.magnific-popup.min.js"></script>
<script src="/js/owl.carousel.js"></script>
<script src="/js/custom.js"></script>
<script src="/js/main.js"></script>

@endsection
