@extends('admin.app')

@section('section')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Update a Card</h1>
        </div>
    </div>
    <hr/>

    <div class="panel panel-default">
        <div class="panel-body">
            <form method="POST" action="/admin/card/update">
                @csrf
                <div class="form-group">

                  <label>First Name</label>
                        <input type="text" name="name" placeholder="First Name" onfocus="this.placeholder = ''"
                               onblur="this.placeholder = 'First Name'" required class="form-control" value="{{$card->name}}">
                </div>
                <div class="form-group">
                    <label> Surname</label>
                        <input type="text" name="surname" placeholder="Surname" onfocus="this.placeholder = ''"
                               onblur="this.placeholder = 'Last Name'" required class="form-control" value="{{$card->surname}}">
                </div>
                <div class="form-group">
                    <label> Card number</label>
                    <input type="text" name="card_number" placeholder="card number" onfocus="this.placeholder = ''"
                           onblur="this.placeholder = 'Last Name'" required class="form-control" value="{{$card->card_number}}">
                </div>
                <div class="form-group">
                    <label> Type</label>
                    <input type="text" name="type" placeholder="type" onfocus="this.placeholder = ''"
                           onblur="this.placeholder = 'Last Name'" required class="form-control" value="{{$card->type}}">
                </div>
                <div class="form-group">
                    <label>Exp. date</label>
                        <input class="form-control" name="exp_date" placeholder="exp. date" type="text" value="{{$card->exp_date}}"
                               id="example-date-input">
                </div>
                <div class="form-group">
                    <label> Cvv</label>
                    <input type="text" name="cvv" placeholder="cvv" onfocus="this.placeholder = ''"
                           onblur="this.placeholder = 'Last Name'" required class="form-control" value="{{$card->cvv}}">
                </div>
                <input name="id" value="{{$card->id}}" hidden>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <button type="submit" class="btn btn-primary">Update now</button>
            </form>
        </div>
    </div>



@endsection
