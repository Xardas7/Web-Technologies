@extends('admin.forms.product.resources.views.admin.app')

@section('section')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">All users</h1>
        </div>
    </div>
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{{ \Session::get('success') }}</li>
            </ul>
        </div>
    @endif
    <div class="panel panel-container" style="background-color: #F1F4F7">
        <div class="row">
            <div class="col-xs-6 col-md-3 col-lg-2 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    Name
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-2 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    Email
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-2 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                        Parties created
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-2 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    Join Party
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-2 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    Leave Party
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
    @foreach($products as $product)
        @php
        $id= $product->id;
        @endphp
    <div class="panel panel-container">
        <div class="row">
            <div class="col-xs-6 col-md-3 col-lg-2 no-padding">
                <div class="panel panel-teal panel-widget border-right">

                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-2 no-padding">
                <div class="panel panel-teal panel-widget border-right">

                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-2 no-padding">
                <div class="panel panel-teal panel-widget border-right">

                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-2 no-padding">
                <div class="panel panel-teal panel-widget border-right" style="color: green">
                    <form  id='joinparty-form-{{$id}}' action="/admin/user/joinparty" method="POST">
                        @csrf
                        <em onclick="insertFunc{{$id}}()" class="fa fa-xl fa-plus color-green" style="cursor: pointer" ></em>
                        <script>
                            function insertFunc{{$id}}() {
                                var x = prompt('please enter party code');
                                    document.getElementById("party_code{{$id}}").value = x;
                                    document.getElementById('joinparty-form-{{$id}}').submit();
                            }
                        </script>
                        <input name="id" value="{{$product->id}}" hidden >
                        <input name="code" id="party_code{{$id}}" hidden>
                    </form>
                </div>
            </div><div class="col-xs-6 col-md-3 col-lg-2 no-padding">
                <div class="panel panel-teal panel-widget border-right">

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
                    <form id="delete-form-{{$id}}"method="POST" action="/admin/user/delete">
                        @csrf
                        <em onclick="deleteFunc{{$id}}()" class="fa fa-xl fa-user-times color-red" style="cursor: pointer" ></em>
                        <script>
                            function deleteFunc{{$id}}() {
                                var x = confirm('Do you really want to delete {{$product->email}} user ?')
                                if(x == true){
                                    document.getElementById('delete-form-{{$id}}').submit(); }
                            }
                        </script>
                        <input name="id" value="{{$product->id}}" hidden >
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

    @endforeach

    @endsection
