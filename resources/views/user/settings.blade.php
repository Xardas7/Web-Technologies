@extends('layouts.app')
{{-- 
@section('css')
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
@endsection --}}

<!-- Start banner Area -->
@section('content')
<section class="generic-banner relative">
    <div class="row height align-items-center justify-content-center">
        <div class="col-lg-10">
            <div class="generic-banner-content">
                <h2 class="text-white text-center">Hello {{$user->name.' '.$user->surname}}</h2>
                <p class="text-white">Here you can edit your profile</p>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->
<!-- Nav pills -->


<!-- Start Align Area -->
<div class="container">
    <div class="row justify-content-center settings">
        <!-- Nav pills -->
        <ul class="nav nav-pills col-12  text-center justify-content-around p-4"
            role="tablist">
            <li class="nav-item col-3 p-0">
                <a class="nav-link active" data-toggle="pill" href="#home">Profile</a>
            </li>
            <li class="nav-item col-3 p-0">
                <a class="nav-link" data-toggle="pill" href="#menu1">Addresses</a>
            </li>
            <li class="nav-item col-3 p-0">
                <a class="nav-link" data-toggle="pill" href="#menu2">Cards</a>
            </li>
        </ul>



        <!-- Tab panes -->
        <div class="tab-content col-8">
            <div id="home" class="container tab-pane active">
                <div class="section-top-border  ">

                    
                    <h3 class="text-center mb-50 col-12">My Information</h3>

                    <form action="#">
                        @csrf
                        <div class="form-group row justify-content-center p-1">
                            <label class="col-2 col-form-label">First Name</label>
                            <div class="input-group-icon col-6">
                                <div class="icon">
                                    <i class="fas fa-caret-right"></i>                                
                                </div>
                                <input type="text" name="name" placeholder="First Name" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'First Name'" required class="single-input"
                                    value="{{$user->name}}">
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <label class="col-2 col-form-label">Last Name</label>
                            <div class="input-group-icon col-6">
                                <div class="icon">
                                    <i class="fas fa-caret-right" aria-hidden="true"></i>
                                </div>
                                <input type="text" name="last_name" placeholder="Last Name"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" required
                                    class="single-input" value="{{$user->surname}}">
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <label for="example-date-input" class="col-2 col-form-label">Birhtdate</label>
                            <div class="input-group-icon col-6">
                                <div class="icon">
                                    <i class="fas fa-birthday-cake" aria-hidden="true"></i>
                                </div>
                                <input class="form-control" type="date" value="{{$user->birth_date}}"
                                    id="example-date-input">
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <label class="col-2 col-form-label">Email</label>
                            <div class="input-group-icon col-6">
                                <div class="icon">
                                    <i class="fas fa-envelope" aria-hidden="true"></i>
                                </div>
                                <input type="email" name="EMAIL" placeholder="Email address"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'" required
                                    class="single-input" value="{{$user->email}}">
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <label class="col-2 col-form-label">Sex</label>
                            <div class="input-group-icon col-6">
                                <div class="icon">
                                    <i class="fas fa-venus-mars" aria-hidden="true"></i>
                                </div>
                                <div class="form-select" id="default-select">
                                    <select>
                                        <option value="male" {{$user->sex ? 'male' : 'selected'}}>Male
                                        </option>
                                        <option value="female" {{$user->sex ? 'male' : 'selected'}}>Female
                                        </option>
                                        <option value="undefined" {{$user->sex ? 'male' : 'selected'}}>
                                            Undefined</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-30">
                            <button class="btn btn-success btn-save" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>

            <div id="menu1" class="container tab-pane fade"><br>

                <h3 class="text-center mt-50 mb-50">My Adresses</h3>

                <div class="addresses">

                    <div class="row col-12 justify-content-around mb-50">

                        @foreach($addresses as $address)
                        <div class="address col-5 border border-dark rounded">
                            <div class="h-100 p-3">

                                <div class="h-90">
                                    <i class="fas fa-map-marker-alt fa-2x" style="color:#f41068"></i>
                                    <ul>
                                    <li class="p-1">
                                        {{ $address->user->name.' '.$address->user->surname }}
                                    </li>
                                        <li class="p-1">{{ $address->address }}</li>
                                        <li class="p-1">{{ $address->address_additional }}</li>
                                        <li class="p-1">{{ $address->city.', '.$address->postal_code }}</li>
                                        <li class="p-1">{{ $address->country }}</li>
                                    </ul>
                                </div>

                                <div class="h-auto">

                                    <span>
                                    <a href="{{ route('address.edit',['id' => $address->id]) }}">Modify</a>
                                    </span>
                                    &nbsp; | &nbsp;
                                    <span>
                                        <a href="#">Remove</a>
                                    </span>

                                </div>

                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>


            </div>


            <div id="menu2" class="container tab-pane fade"><br>
                <h3>Menu 2</h3>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                    totam rem aperiam.</p>
            </div>
        </div>
    </div>
    <!-- Navpills -->
</div>
<br>


</div>
<!-- End Align Area -->
@endsection


@section('js')
<script src="../js/vendor/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
    integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
</script>
<script src="../js/vendor/bootstrap.min.js"></script>
<script src="../js/owl.carousel.min.js"></script>
<script src="../js/jquery.ajaxchimp.min.js"></script>
<script src="../js/jquery.sticky.js"></script>
<script src="../js/jquery.nice-select.min.js"></script>
<script src="../js/parallax.min.js"></script>
<script src="../js/jquery.magnific-popup.min.js"></script>
<script src="../js/custom.js"></script>
<script src="../js/main.js"></script>
@endsection