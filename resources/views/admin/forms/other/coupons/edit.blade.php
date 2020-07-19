@extends('admin.app')

@section('section')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Create a Coupon</h1>
        </div>
    </div>
    <hr/>

    <div class="panel panel-default">
        <div class="panel-body">
            <form method="POST" action="/admin/coupon/update">
                @csrf
                <div class="form-group">

                    <div class="form-group">
                        <label>Code</label>
                        <input type="text" name="code" placeholder="code" onfocus="this.placeholder = ''"
                               onblur="this.placeholder = 'Email address'" required class="form-control" value="{{$coupon->code}}">
                    </div>

                    <label>Amount</label>
                    <input type="number" name="amount" placeholder="amount" onfocus="this.placeholder = ''"
                           onblur="this.placeholder = 'First Name'" required class="form-control" value="{{$coupon->amount}}">
                </div>
                <div class="form-group">
                    <label> Quantity</label>
                    <input type="number" name="quantity" placeholder="quantity" onfocus="this.placeholder = ''"
                           onblur="this.placeholder = 'Last Name'" required class="form-control" value="{{$coupon->quantity}}">
                </div>
                <div class="form-group">
                    <label> Exp. Date</label>
                    <input type="date" name="exp_date" placeholder="exp_date" onfocus="this.placeholder = ''"
                           onblur="this.placeholder = 'Last Name'" required class="form-control" value="{{$coupon->exp_date}}">
                </div>
            <input name="id" value="{{$coupon->id}}" hidden>
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
