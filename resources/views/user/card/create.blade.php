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

        <div class="row col-12 justify-content-center">
            <h3 class="mb-10 mt-50">My Card</h3>
        </div>

        <form class="col-6 p-5" action="{{ route('card.store') }}" method="POST">
            @csrf
            <div class="form-group row justify-content-center">
                <label class="col-2 col-form-label">Number</label>
                <div class="input-group-icon col-10">
                    <div class="icon">
                        <i class="far fa-credit-card"></i>
                    </div>
                    <input type="number" name="card_number" placeholder="Card number" onfocus="this.placeholder = ''"
                        onblur="this.placeholder = 'Card number'" required class="single-input" value="">
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label for="example-date-input" class="col-2 col-form-label">Exp Date</label>
                <div class="input-group-icon col-10">
                    <div class="icon">
                        <i class="far fa-calendar-alt"></i>
                    </div>
                    <input class="single-input" name="exp_date" type="text" placeholder="Example: 2020/04"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Example: 2020/04'"  maxlength="7" required>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label class="col-2 col-form-label">Type</label>
                <div class="input-group-icon col-10">
                    <div class="icon">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <select class="form-control padding" name="type">
                        <option value="visa">Visa
                        </option>
                        <option value="mastercard">Mastercard
                        </option>
                    </select>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label class="col-2 col-form-label">CVV</label>
                <div class="input-group-icon col-10">
                    <div class="icon">
                        <i class="fas fa-caret-right"></i>
                    </div>
                    <input type="number" name="cvv" placeholder="CVV" onfocus="this.placeholder=''"
                        onblur="this.placeholder = 'CVV'" required class="single-input" min="100" max="999" value="">
                </div>
            </div>

            <div class="form-group row justify-content-center p-1">
                <label class="col-2 col-form-label">Name</label>
                <div class="input-group-icon col-10">
                    <div class="icon">
                        <i class="fas fa-caret-right"></i>
                    </div>
                    <input type="text" name="name" placeholder="First Name" onfocus="this.placeholder = ''"
                        onblur="this.placeholder = 'First Name'" required class="single-input" value="">
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label class="col-2 col-form-label">Surname</label>
                <div class="input-group-icon col-10">
                    <div class="icon">
                        <i class="fas fa-caret-right" aria-hidden="true"></i>
                    </div>
                    <input type="text" name="surname" placeholder="Last Name" onfocus="this.placeholder = ''"
                        onblur="this.placeholder = 'Last Name'" required class="single-input" value="">
                </div>
            </div>

            <div class="text-center mt-30">
                <button class="btn btn-success btn-save" type="submit">Save</button>
            </div>
        </form>

    </div>
</div>
<br>


</div>
<!-- End Align Area -->
@endsection


@section('js')
<script src="{{ asset('/js/vendor/jquery-2.2.4.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
    integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
</script>
<script src="{{ asset('/js/vendor/bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('/js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('/js/jquery.sticky.js') }}"></script>
<script src="{{ asset('/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('/js/parallax.min.js') }}"></script>
<script src="{{ asset('/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('/js/custom.js') }}"></script>
<script src="{{ asset('/js/main.js') }}"></script>
@endsection