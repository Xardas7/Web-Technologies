@extends('admin.app')

@section('section')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">User Update</h1>
        </div>
    </div>
    <hr/>

    <div class="panel panel-default">
        <div class="panel-body">
    <form method="POST" action="/admin/user/update">
        @csrf
        <input name="id" value="{{$user->id}}" hidden>
        <div class="form-group">
            <label>Email</label>
            <input class="form-control" value="{{$user->email}}" name="email" >
        </div>
        <div class="form-group">
            <label>Name</label>
            <input class="form-control" value="{{$user->name}}" name="name" >
        </div>
        <div class="form-group">
            <label>Surname</label>
            <input class="form-control" value="{{$user->surname}}" name="surname" >
        </div>
        <div class="form-group">
            <label >Birthdate</label>
                <input class="form-control" name="birth_date" type="date" value="{{$user->birth_date}}"
                       id="example-date-input">
        </div>

        <div class="form-group">
            <label>Sex</label>
                <select class="form-control padding" name="sex">
                    <option value="male" {{$user->sex == 'male' ? 'selected' : ''}}>Male
                    </option>
                    <option value="female" {{$user->sex == 'female' ? 'selected' : ''}}>Female
                    </option>
                    <option value="undefined" {{$user->sex == 'undefined' ? 'selected' : ''}}>
                        Undefined</option>
                </select>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" value="passwordnoncambiata" name="password" >
        </div>
        <div class="form-group">
            <label>Role</label>
            <select class="form-control padding" name="role">
                <option value="customer" selected>
                    Customer
                </option>
                <option value="admin">
                    Admin
                </option>
                <option value="producer">
                    Producer
                </option>
            </select>
        </div>

        <input value="{{$user->email}}" name="old_email" hidden>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <button type="submit" class="btn btn-primary">Update</button>
        if you don't change your password, it stays the same
    </form>
        </div>
    </div>
@endsection
