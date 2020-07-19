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
            <form method="POST" action="/admin/coupon/store">
                @csrf
                <div class="form-group">

                    <div class="form-group">
                        <label>Code</label>
                        <input type="text" name="code" placeholder="code" onfocus="this.placeholder = ''"
                               onblur="this.placeholder = 'Email address'" required class="form-control" value="">
                    </div>

                    <label>Amount</label>
                    <input type="number" name="amount" placeholder="amount" onfocus="this.placeholder = ''"
                           onblur="this.placeholder = 'First Name'" required class="form-control" value="">
                </div>
                <div class="form-group">
                    <label> Quantity</label>
                    <input type="number" name="quantity" placeholder="quantity" onfocus="this.placeholder = ''"
                           onblur="this.placeholder = 'Last Name'" required class="form-control" value="">
                </div>
                <div class="form-group">
                    <label> Exp. Date</label>
                    <input type="date" name="exp_date" placeholder="exp_date" onfocus="this.placeholder = ''"
                           onblur="this.placeholder = 'Last Name'" required class="form-control" value="">
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
                <button type="submit" class="btn btn-primary">Create now</button>
            </form>
        </div>
    </div>



@endsection
