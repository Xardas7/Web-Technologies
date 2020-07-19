@extends('admin.app')

@section('section')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Update Order Status</h1>
        </div>
    </div>
    <hr/>

    <div class="panel panel-default">
        <div class="panel-body">
        <form method="POST" action="{{route('admin.order.update',['id' => $order->id])}}">
                @csrf
                <div class="form-group">
                    <label for="state">State</label>
                    <select class="form-control" name="state" id="state">
                        <option value="in progress">In progress</option>
                        <option value="success">Success</option>
                        <option value="shipped">Shipped</option>
                        <option value="finalized">Finalized</option>
                        <option value="delivery failed">Delivery failed</option>
                        <option value="canceled">Canceled</option>
                        <option value="returned">Returned</option>
                    </select>
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
