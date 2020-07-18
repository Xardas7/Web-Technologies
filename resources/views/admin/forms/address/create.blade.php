@extends('admin.app')

@section('section')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Create a new Address</h1>
        </div>
    </div>
    <hr/>

    <div class="panel panel-default">
        <div class="panel-body">
            <form method="POST" action="/admin/address/store">
                @csrf
                <div class="form-group">
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" placeholder="Email" name="email">
                    </div>
                                <label>Address</label>
                                    <input type="text" name="address" placeholder="Address" onfocus="this.placeholder = ''"
                                           onblur="this.placeholder = 'Address'" required class="form-control" value="">
                                </div>

                            <div class="form-group">
                                <label>Additional Info</label>

                                    <input type="text" name="address_additional" placeholder="Additional info"
                                           onfocus="this.placeholder = ''" onblur="this.placeholder = 'Additional Address'"
                                           class="form-control" value="">
                                </div>


                            <div class="form-group">
                                <label>Type</label>
                                    <select class="form-control padding" name="type">
                                        <option value="billing" selected>
                                            Billing
                                        </option>
                                        <option value="delivery">
                                            Shipping
                                        </option>
                                        <option value="both">
                                            Both
                                        </option>
                                    </select>
                            </div>
                            <div class="form-group">
                                <label>City</label>
                                    <input type="text" name="city" placeholder="City" onfocus="this.placeholder=''"
                                           onblur="this.placeholder = 'City'" required class="form-control" value="">
                                </div>
                            <div class="form-group">
                                <label>Postal Code</label>
                                    <input type="text" name="postal_code" placeholder="Postal Code" onfocus="this.placeholder=''"
                                           onblur="this.placeholder = 'Postal Code'" required class="form-control" value="">
                                </div>

                            <div class="form-group">
                                <label>Country</label>
                                    <input type="text" name="country" placeholder="Country" onfocus="this.placeholder=''"
                                           onblur="this.placeholder = ''" required class="form-control" value="">
                                </div>
                                <!--
                                <div class="switch-wrap d-flex justify-content-between single-element-widget" style="margin: 20px">
                                    <div class="primary-checkbox">
                                        <input type="checkbox" id="primary-checkbox" name="default" checked="">
                                        <label for="primary-checkbox"></label>
                                    <p style="margin-left: 10px">Set as default</p>
                                </div>
                                -->
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
                                </div>
            </form>
        </div>
    </div>

@endsection
