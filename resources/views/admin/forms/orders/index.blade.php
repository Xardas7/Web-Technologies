@extends('admin.app')

@section('section')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">All Orders</h1>
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
            <div class="col-xs-6 col-md-3 col-lg-2 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    user email
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-2 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    billing address
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-2 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    shipping address
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-1 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    amount
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-1 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                   products
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-1 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    card
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-1 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    track
                </div>
            </div>

            <div class="col-xs-6 col-md-3 col-lg-1 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    state
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-1 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    edit
                </div>
            </div>
        </div>
    </div>
    @foreach($orders as $order)
        @php
            $id= $order->id;
        @endphp
        <div class="panel panel-container">
            <div class="row">
                <div class="col-xs-6 col-md-3 col-lg-2 no-padding">
                    <div class="panel panel-teal panel-widget border-right" style="word-wrap: break-word; overflow-wrap: break-word;">{{$order->user->email}}</div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-2 no-padding">
                    <div class="panel panel-teal panel-widget border-right">
                    @php
                    $billing=\App\Address::find($order->billing_address_id)->address;
                    @endphp
                        {{$billing}}
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-2 no-padding">
                    <div class="panel panel-teal panel-widget border-right">
                        @php
                            $shipping=\App\Address::find($order->shipping_address_id)->address;
                        @endphp
                        {{$shipping}}
                </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-1 no-padding">
                    <div class="panel panel-teal panel-widget border-right">
                        {{$order->amount}}
                    </div>
                </div>
                    <div class="col-xs-6 col-md-3 col-lg-1 no-padding">
                        <div class="panel panel-teal panel-widget border-right">
                            <a href="/admin/user/{{$id}}/edit"> <i class="fa fa-xl fa-shopping-basket"></i> </a>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 col-lg-1 no-padding">
                        <div class="panel panel-teal panel-widget border-right">
                            <a href="/admin/user/{{$id}}/edit"> <i class="fa fa-xl fa-credit-card"></i> </a>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 col-lg-1 no-padding">
                        <div class="panel panel-teal panel-widget border-right">
                                <em class="fa fa-xl fa-truck color-green" onclick="myFunction{{$id}}()" style="color : #2d995b; cursor: help;" ></em>
                                <script>
                                    function myFunction{{$id}}() {
                                        alert("{{$order->track}}");
                                    }
                                </script>
                        </div>
                    </div>
                <div class="col-xs-6 col-md-3 col-lg-1 no-padding">
                    <div class="panel panel-teal panel-widget border-right">
                        {{$order->state}}
                    </div>
                </div>
                    <div class="col-xs-6 col-md-3 col-lg-1 no-padding">
                        <div class="panel panel-teal panel-widget border-right">
                            <a href="/admin/user/{{$id}}/edit"> <i class="fa fa-xl fa-edit"></i> </a>
                        </div>
                    </div>
            </div>
        </div>

    @endforeach
@endsection
