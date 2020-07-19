@extends('admin.app')

@section('section')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">All Coupons</h1>
        </div>
    </div>
    <div class="col-lg-12">
        <a href="/admin/coupon/new"  >  <h3 class="page-header"  style="color: green; cursor: pointer;" >Add a Coupon <em class="fa fa-plus color-green"></em></h3>
        </a>
    </div>
    <div>
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    @endif
    </div>
    <div class="panel panel-container" style="background-color: #F1F4F7">
        <div class="row">
            <div class="col-xs-6 col-md-3 col-lg-4 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    Code
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-2 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    Amount
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-2 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    Exp. Date
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-2 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    Quantity
                </div>
            </div>

            <div class="col-xs-6 col-md-3 col-lg-1 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    Edit
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-1 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    Delete
                </div>
            </div>
        </div>
    </div>
    @foreach($coupons as $coupon)
        @php
            $id= $coupon->id;
        @endphp
        <div class="panel panel-container">
            <div class="row">
                <div class="col-xs-6 col-md-3 col-lg-4 no-padding">
                    <div class="panel panel-teal panel-widget border-right">
                        {{$coupon->code}}
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-2 no-padding">
                    <div class="panel panel-teal panel-widget border-right">
                        {{$coupon->amount}}
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-2 no-padding">
                    <div class="panel panel-teal panel-widget border-right">
                        {{$coupon->exp_date}}
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-2 no-padding">
                    <div class="panel panel-teal panel-widget border-right">
                        {{$coupon->quantity}}
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-1 no-padding">
                    <div class="panel panel-teal panel-widget border-right">
                        <a href="/admin/coupon/{{$id}}/edit"> <i class="fa fa-xl fa-edit"></i> </a>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-1 no-padding">
                    <div class="panel panel-teal panel-widget border-right">
                        <form id="delete-form-{{$id}}"method="POST" action="/admin/coupon/delete">
                            @csrf
                            <em class="fa fa-xl fa-times color-red" style="cursor: pointer;" onclick="deleteFunc{{$id}}()" ></em>
                            <script>
                                function deleteFunc{{$id}}() {
                                    var x = confirm('Do you really want to delete this coupon ?')
                                    if(x == true){
                                        document.getElementById('delete-form-{{$id}}').submit(); }
                                }
                            </script>
                            <input name="id" value="{{$id}}" hidden >
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
