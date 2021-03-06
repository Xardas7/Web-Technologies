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

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="row justify-content-center settings">

        <div class="row col-12 justify-content-center">
            <h3 class="mb-10 mt-50">My address</h3>
        </div>


        <form class="col-6 p-5" action="{{ route('address.store') }}" method="POST">
            @csrf
            <div class="form-group row justify-content-center">
                <label class="col-2 col-form-label">Address</label>
                <div class="input-group-icon col-10">
                    <div class="icon">
                        <i class="fa fa-thumb-tack" aria-hidden="true"></i>
                    </div>
                    <input type="text" name="address" placeholder="Address" onfocus="this.placeholder = ''"
                        onblur="this.placeholder = 'Address'" required class="single-input" value="">
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label class="col-2 col-form-label">Additional Info</label>
                <div class="input-group-icon col-10">
                    <div class="icon">
                        <i class="fas fa-info" aria-hidden="true"></i>
                    </div>
                    <input type="text" name="address_additional" placeholder="Additional info"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Additional Address'"
                        class="single-input" value="">
                </div>
            </div>



            <div class="form-group row justify-content-center">
                <label class="col-2 col-form-label">Type</label>
                <div class="input-group-icon col-10">
                    <div class="icon" aria-hidden="true">
                        <i class="fas fa-truck"></i>
                    </div>
                    <select class="form-control padding" name="type">
                        <option value="billing" selected>
                            Billing
                        </option>
                        <option value="delivery">
                            Shipping
                        </option>
                        <option value="both">
                            Both
                        </option>
                    </select>

                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label class="col-2 col-form-label">City</label>
                <div class="input-group-icon col-10">
                    <div class="icon">
                        <i class="fas fa-city" aria-hidden="true"></i>
                    </div>
                    <input type="text" name="city" placeholder="City" onfocus="this.placeholder=''"
                        onblur="this.placeholder = 'City'" required class="single-input" value="">
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label class="col-2 col-form-label">Postal Code</label>
                <div class="input-group-icon col-10">
                    <div class="icon">
                        <i class="fas fa-map-marked-alt" aria-hidden="true"></i>
                    </div>
                    <input type="text" name="postal_code" placeholder="Postal Code" onfocus="this.placeholder=''"
                        onblur="this.placeholder = 'Postal Code'" required class="single-input" value="">
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label class="col-2 col-form-label">Country</label>
                <div class="input-group-icon col-10">
                    <div class="icon">
                        <i class="fas fa-globe-americas" aria-hidden="true">
                        </i>
                    </div>
                    <input type="text" name="country" placeholder="" onfocus="this.placeholder=''"
                        onblur="this.placeholder = ''" required class="single-input" value="">
                </div>
                <div class="switch-wrap d-flex justify-content-between single-element-widget" style="margin: 20px">
                    <div class="primary-checkbox">
                        <input type="checkbox" id="primary-checkbox" name="default" checked="">
                        <label for="primary-checkbox"></label>
                    </div>
                    <p style="margin-left: 10px">Set as default</p>
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