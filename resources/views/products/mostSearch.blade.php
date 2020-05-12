<!-- Start Most Search Product Area -->
<section class="section-half">
    <div class="container">
        <div class="organic-section-title text-center">
            <h3>Most Searched Products</h3>
        </div>
            @foreach($most_search = \App\MostSearchedProducts::all()->sortByDesc('count')->take(15) as $ms )

        <div class="row mt-30">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="single-search-product d-flex">
                    <a href="/{{$ms->product->name}}"><img src="{{$ms->product->images->first()->path }}" alt=""></a>
                    <div class="desc">
                        <a href="/{{$ms->product->name}}" class="title">{{$ms->product->name}}</a>
                        <div class="price"><span class="lnr lnr-tag"></span> {{$ms->product->price}}</div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</section>
<!-- End Most Search Product Area -->

