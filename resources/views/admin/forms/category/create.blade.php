@extends('admin.app')

@section('section')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add a Category</h1>
        </div>
    </div>
    <hr/>

    <div class="panel panel-default">
        <div class="panel-body">
            <form method="POST" action="/admin/category/store">
                @csrf
                <div class="form-group">

                    <label>Category Name</label>
                    <input type="text" name="name" placeholder="Category Name" onfocus="this.placeholder = ''"
                           onblur="this.placeholder = 'Category Name'" required class="form-control" value="">
                </div>
                <label>Category Gender</label>
                <select name="gender" id="genders" class="form-control">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                <div class="form-group">
                    <label>Category Type</label>
                    <input type="text" name="type" placeholder="Category Type" onfocus="this.placeholder = ''"
                           onblur="this.placeholder = 'Category Type'" required class="form-control" value="">
                </div>
                <div class="form-group">
                    <label>Category Sizes</label>
                    <input type="text" name="sizes" placeholder="Category Sizes (separate with a comma)" onfocus="this.placeholder = ''"
                           onblur="this.placeholder = 'Category Sizes (separate with a comma)'" required class="form-control" value="">
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
                <button type="submit" class="btn btn-primary">Update now</button>
            </form>
        </div>
    </div>



@endsection
