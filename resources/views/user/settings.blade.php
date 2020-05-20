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
    <div class="container">
        <div class="row height align-items-center justify-content-center">
            <div class="col-lg-10">
                <div class="generic-banner-content">
                    <h2 class="text-white text-center">Hello {{$user->name.' '.$user->surname}}</h2>
                    <p class="text-white">Here you can edit your profile</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->


<!-- Start Align Area -->
<div class="whole-wrap pb-100">
    <div class="container">
        <br>
        <!-- Nav pills -->
        <ul class="nav nav-pills" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="pill" href="#home">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#menu1">Addreses</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#menu2">Cards</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div id="home" class="container tab-pane active"><br>
                <div class="section-top-border">
                    <div class="row">
                        <div class="col-lg-8 col-md-8">

                            <h3 class="mb-30">My Information</h3>

                            <form action="#">

                                <div class="form-group row">
                                    <label class="col-2 col-form-label">First Name</label>
                                    <div class="col-10">
                                        <input type="text" name="name" placeholder="First Name"
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'"
                                            required class="single-input" value="{{$user->name}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Last Name</label>
                                    <div class="col-10">
                                        <input type="text" name="last_name" placeholder="Last Name"
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'"
                                            required class="single-input" value="{{$user->surname}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-date-input" class="col-2 col-form-label">Birhtdate</label>
                                    <div class="col-10">
                                        <input class="form-control" type="date" value="{{$user->birth_date}}"
                                            id="example-date-input">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Sex</label>
                                    <div class="input-group-icon col-10">
                                        <div class="icon">
                                            <i class="fas fa-venus-mars" aria-hidden="true"></i>
                                        </div>
                                        <div class="form-select" id="default-select">
                                            <select>
                                                <option value="male" {{$user->sex ? 'male' : 'selected'}}>Male</option>
                                                <option value="female" {{$user->sex ? 'male' : 'selected'}}>Female</option>
                                                <option value="undefined" {{$user->sex ? 'male' : 'selected'}}>Undefined</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Email</label>
                                    <div class="col-10">
                                        <input type="email" name="EMAIL" placeholder="Email address"
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'"
                                    required class="single-input" value="{{$user->email}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label">City</label>
                                    <div class="input-group-icon col-10">
                                        <div class="icon">
                                            <i class="fa fa-plane" aria-hidden="true"></i>
                                        </div>
                                        <div class="form-select" id="default-select">
                                            <select>
                                                <option value="1">City</option>
                                                <option value="1">Dhaka</option>
                                                <option value="1">Dilli</option>
                                                <option value="1">Newyork</option>
                                                <option value="1">Islamabad</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Country</label>
                                    <div class="input-group-icon col-10">
                                        <div class="icon"><i class="fa fa-globe" aria-hidden="true"></i></div>
                                        <div class="form-select" id="default-select">
                                            <select>
                                                <option value="1">Country</option>
                                                <option value="1">Bangladesh</option>
                                                <option value="1">India</option>
                                                <option value="1">England</option>
                                                <option value="1">Srilanka</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <div id="menu1" class="container tab-pane fade"><br>
                <h3>Menu 1</h3>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.</p>
            </div>
            <div id="menu2" class="container tab-pane fade"><br>
                <h3>Menu 2</h3>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                    totam rem aperiam.</p>
            </div>
        </div>
        <!-- Navpills -->

    </div>
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