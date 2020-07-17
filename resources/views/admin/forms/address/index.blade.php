@extends('admin.app')

@section('section')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">All Adresses</h1>
        </div>
    </div>
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    @endif

    <div class="panel panel-container" style="background-color: #F1F4F7">
        <div class="row">
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    Email
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-2 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    Address
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-1 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    City
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-1 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    Country
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-1 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    Postal Code
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-1 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    Type
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-1 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    Address Additional
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
    @foreach($addresses as $address)
        @php
        $id=$address->id
        @endphp
    <div class="panel panel-container">

        <div class="row">
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    {{$address->user->email}}
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-2 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    {{$address->address}}
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-1 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    {{$address->city}}
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-1 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    {{$address->country}}
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-1 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    {{$address->postal_code}}
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-1 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    {{$address->type}}
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-1 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    @if($address->address_additional!=null)
                    <em class="fa fa-xl fa-eye color-green" onclick="myFunction{{$id}}()" style="color : #2d995b; cursor: help;" ></em>
                    <script>
                        function myFunction{{$id}}() {
                            alert("{{$address->address_additional}}");
                        }
                    </script>
                    @else
                    <p style="color: red">nothing</p>
                        @endif
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-1 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    <a href="/admin/user/{{$id}}/edit"> <i class="fa fa-xl fa-edit"></i> </a>
                </div>
            </div>

            <div class="col-xs-6 col-md-3 col-lg-1 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    @if($id == 1)
                        <p style="color: red">
                            can't delete
                        </p>
                    @else
                        <form id="delete-form-{{$id}}"method="POST" action="/admin/product/delete">
                            @csrf
                            <em onclick="deleteFunc{{$id}}()" class="fa fa-xl fa-user-times color-red" style="cursor: pointer" ></em>
                            <script>
                                function deleteFunc{{$id}}() {
                                    var x = confirm('Do you really want to delete {{$address->address}} user ?')
                                    if(x == true){
                                        document.getElementById('delete-form-{{$id}}').submit(); }
                                }
                            </script>
                            <input name="id" value="{{$address->id}}" hidden >
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </form>
                </div>
            </div>

        </div>
    </div>
    @endforeach
@endsection
