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
            <div class="col-xs-6 col-md-3 col-lg-1 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    Logo
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-4 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    Producer Email
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    Name
                </div>
            </div>

            <div class="col-xs-6 col-md-3 col-lg-2 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    Edit
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-2 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    Delete
                </div>
            </div>
        </div>
    </div>
    @foreach($producers as $producer)
        @php
            $id= $producer->id;
        @endphp
        <div class="panel panel-container">
            <div class="row">
                <div class="col-xs-6 col-md-3 col-lg-1 no-padding">
                    <div class="panel panel-teal panel-widget border-right">
                        <img src="{{$producer->logo}}" style="width: 60px; height: 60px" >
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-4 no-padding">
                    <div class="panel panel-teal panel-widget border-right">
                        {{$producer->amount}}
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-teal panel-widget border-right">
                        {{$producer->name}}
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-2 no-padding">
                    <div class="panel panel-teal panel-widget border-right">
                        <a href="/admin/producer/{{$id}}/edit"> <i class="fa fa-xl fa-edit"></i> </a>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-2 no-padding">
                    <div class="panel panel-teal panel-widget border-right">
                        <form id="delete-form-{{$id}}"method="POST" action="/admin/producer/delete">
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
