@extends('admin.app')

@section('section')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Create a Producer</h1>
        </div>
    </div>
    <hr/>

    <div class="panel panel-default">
        <div class="panel-body">
            <form method="POST" action="/admin/producer/update">
                @csrf
                <div class="form-group">

                    <label>Name</label>
                    <input type="text" name="name" placeholder="name" onfocus="this.placeholder = ''"
                           onblur="this.placeholder = 'First Name'" required class="form-control" value="{{$producer->name}}">
                </div>
                <div class="form-group">
                    <label> Logo</label>
                    <input type="text" name="logo" placeholder="logo link" onfocus="this.placeholder = ''"
                           onblur="this.placeholder = 'Last Name'" required class="form-control" value="{{$producer->logo}}">
                </div>
                <input name="id" value="{{$producer->id}}" hidden>
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
