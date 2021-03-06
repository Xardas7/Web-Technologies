@extends('admin.app')

@section('section')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add a Product</h1>
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
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
        @endif
    </div>
    <hr/>

    <div class="panel panel-default">
        <div class="panel-body">
            @php
               $user = \Illuminate\Support\Facades\Auth::user();
                $producer_id= \App\Producer::where('user_id',$user->id)->first();
            @endphp

            @if($user->hasRole('admin'))
                <form method="POST" action="/admin/product/store" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Producer</label>
                        <select name="producer_id" id="producers" class="form-control">
                            @foreach($producers as $producer)
                        <option value="{{$producer->id}}">{{$producer->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @else
                        <form method="POST" action="/dashboard/product/store" enctype="multipart/form-data">
                            @csrf


                            <input name="producer_id" value="{{ $producer_id->id}}" hidden>
                             @endif
                    <div class="form-group">
                        <label>Category Name</label>
                        <select name="category_name" id="categories" class="form-control" required>
                            <optgroup label="Female">
                            @foreach($categories_female as $category)
                            <option value="{{\App\Category::where('name',$category->name)->where('gender','female')->first()->id}}"> {{$category->name}}</option>
                              @endforeach
                            </optgroup>
                            <optgroup label="Male">
                                @foreach($categories_male as $category)
                            <option value="{{\App\Category::where('name',$category->name)->where('gender','male')->first()->id}}"> {{$category->name}}</option>
                              @endforeach
                            </optgroup>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Category Type</label>
                        <select name="category_type" id="categories" class="form-control" required>
                            <optgroup label="Female">
                            @foreach($categories_type_female as $category)
                            <option value="{{$category->id}}"> {{$category->type}}</option>
                              @endforeach
                            </optgroup>
                            <optgroup label="Male">
                                @foreach($categories_type_male as $category)
                                <option value="{{$category->id}}"> {{$category->type}}</option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text"class="form-control" placeholder="Name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label>Code</label>
                        <input type="text"class="form-control" placeholder="Code" name="code" required>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input class="form-control" type="text" placeholder="Price" name="price" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" placeholder="Description" name="description" required>
                        </textarea>
                    </div>
                    <hr>
                    <h2>Details</h2>
                    <div class="form-group">
                        <label>Material</label>
                        <input class="form-control" type="text"placeholder="Material" name="material" required>
                    </div>
                    <div class="form-group">
                        <label>Composition</label>
                        <input class="form-control"type="text" placeholder="Composition" name="composition">
                    </div>
                    <div class="form-group">
                        <label>Quantity</label>
                        <input class="form-control"type="number" placeholder="Quantity" name="quantity" min="1" required>
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
