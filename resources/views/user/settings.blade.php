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

@section('content')

<!-- Start banner Area -->
@include('includes.settings_banner')
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
        <div class="tab-content row w-100 p-4">
            <div id="home" class="container tab-pane active">
                <div class="section-top-border  ">

                    @include('user.my_information')
                    
                </div>
            </div>

            <div id="menu1" class="container tab-pane fade"><br>

                @include('user.my_addresses')

            </div>


            <div id="menu2" class="container tab-pane fade"><br>
                
                @include('user.my_cards')

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