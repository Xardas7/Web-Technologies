@extends('admin.app')

@section('section')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">All Cards</h1>
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
                    User Email
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-2 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    Number
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-2 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    Name
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-2 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    Surname
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-1 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    Type
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-1 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    Exp Date
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
    @foreach($cards as $card)
        @php
        $id= $card->id;
    @endphp
    <div class="panel panel-container">
        <div class="row">
            <div class="col-xs-6 col-md-3 col-lg-2 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    {{$card->user->email}}
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-2 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    {{$card->card_number}}
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-2 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    {{$card->name}}
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-2 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    {{$card->surname}}
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-1 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    {{$card->type}}
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-1 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    {{$card->exp_date}}
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-1 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    <a href="/admin/card/{{$id}}/edit"> <i class="fa fa-xl fa-edit"></i> </a>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-1 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    <form id="delete-form-{{$id}}"method="POST" action="/admin/card/delete">
                        @csrf
                        <em class="fa fa-xl fa-times color-red" style="cursor: pointer;" onclick="deleteFunc{{$id}}()" ></em>
                        <script>
                            function deleteFunc{{$id}}() {
                                var x = confirm('Do you really want to delete this kick ?')
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
