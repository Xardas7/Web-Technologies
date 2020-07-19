@extends('admin.app')

@section('section')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add a Product</h1>
        </div>
    </div>
    <hr/>

    <div class="panel panel-default">
        <div class="panel-body">
                <form method="POST" action="/admin/product/store" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Producer</label>
                        <input type="text" class="form-control" placeholder="Producer" name="producer">
                    </div>
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" class="form-control" placeholder="Category Name" name="category_name">
                    </div>
                    <div class="form-group">
                        <label>Category Type</label>
                        <input type="text" class="form-control" placeholder="Category Type" name="category_type">
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text"class="form-control" placeholder="Name" name="name">
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input class="form-control" type="text" placeholder="Price" name="price">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input class="form-control" type="text" placeholder="Description" name="description">
                    </div>
                    <hr>
                    <h2>Details</h2>
                    <div class="form-group">
                        <label>Material</label>
                        <input class="form-control" type="text"placeholder="Material" name="material">
                    </div>
                    <div class="form-group">
                        <label>Composition</label>
                        <input class="form-control"type="text" placeholder="Composition" name="composition">
                    </div>
                    <div class="form-group">
                        <label>Quantity</label>
                        <input class="form-control"type="text" placeholder="Quantity" name="quantity">
                    </div>
                    <div class="form-group">
                        <label>Width</label>
                        <input class="form-control"type="text" placeholder="Width" name="width">
                    </div>
                    <div class="form-group">
                        <label>Depth</label>
                        <input class="form-control"type="text" placeholder="Depth" name="depth">
                    </div>
                    <div class="form-group">
                        <label>Weight</label>
                        <input class="form-control"type="text" placeholder="Weight" name="weight">
                    </div>
                    <hr>
                    <h2>Images</h2>
                    <div class="form-group">
                        <label>Images from file system</label>
                        <input class="form-control" type="file" placeholder="Images" name="images[]" required multiple>
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
