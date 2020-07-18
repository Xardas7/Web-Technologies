@extends('admin.app')

@section('section')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">All Details</h1>
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
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    Product Code
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-2 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    Material
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-2 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    Quantity
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-1 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    Width
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-1 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    Height
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-1 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    Depth
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-1 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    Weight
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-1 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    Edit
                </div>
            </div>
        </div>
    </div>
    @foreach($details as $detail)
        @php
            $id= $detail->id;
        @endphp
        <div class="panel panel-container">
            <div class="row">
                <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-teal panel-widget border-right">
                        {{$detail->product->code}}
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-2 no-padding">
                    <div class="panel panel-teal panel-widget border-right">

                        @if($detail->material==null)
                            no data
                        @else
                            {{$detail->material}}
                        @endif
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-2 no-padding">
                    <div class="panel panel-teal panel-widget border-right">
                        @if($detail->quantity==null)
                            no available
                        @else
                            {{$detail->quantity}}
                            @endif
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-1 no-padding">
                    <div class="panel panel-teal panel-widget border-right">

                        @if($detail->width==null)
                            no data
                        @else
                            {{$detail->width}}
                        @endif
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-1 no-padding">
                    <div class="panel panel-teal panel-widget border-right">
                        @if($detail->height==null)
                            no data
                        @else
                            {{$detail->height}}
                        @endif
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-1 no-padding">
                    <div class="panel panel-teal panel-widget border-right">
                        @if($detail->depth==null)
                            no data
                        @else
                            {{$detail->depth}}
                        @endif
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-1 no-padding">
                    <div class="panel panel-teal panel-widget border-right">
                        @if($detail->weight==null)
                            no data
                        @else
                            {{$detail->weight}}
                        @endif

                    </div>
                </div>

                <div class="col-xs-6 col-md-3 col-lg-1 no-padding">
                    <div class="panel panel-teal panel-widget border-right">
                        <a href="/admin/product/{{$id}}/edit"> <i class="fa fa-xl fa-edit"></i> </a>
                    </div>
                </div>
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
