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

        <form method="POST" action="{{route('admin.product.update',[$product->id])}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Producer</label>
                        <select name="producer_id" id="producers" class="form-control">
                            @foreach($producers as $producer)
                        <option value="{{$producer->id}}" {{$product->producer->id == $producer->id ? 'selected' : ''}}>{{$producer->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Category Name</label>
                        <select name="category_name" id="categories" class="form-control" required>
                            <optgroup label="Female">
                            @foreach($categories_female as $category)
                            <option value="{{\App\Category::where('name',$category->name)->where('gender','female')->first()->id}}" {{$product->category->id == $category->id ? 'selected' : ''}}> {{$category->name}}</option>
                              @endforeach
                            </optgroup>
                            <optgroup label="Male">
                                @foreach($categories_male as $category)
                            <option value="{{\App\Category::where('name',$category->name)->where('gender','male')->first()->id}}" {{$product->category->id == $category->id ? 'selected' : ''}}> {{$category->name}}</option>
                              @endforeach
                            </optgroup>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Category Type</label>
                        <select name="category_type" id="categories" class="form-control" required>
                            <optgroup label="Female">
                            @foreach($categories_type_female as $category)
                            <option value="{{$category->id}}" {{$product->category->id == $category->id ? 'selected' : ''}}> {{$category->type}}</option>
                              @endforeach
                            </optgroup>
                            <optgroup label="Male">
                                @foreach($categories_type_male as $category)
                                <option value="{{$category->id}}" {{$product->category->id == $category->id ? 'selected' : ''}}> {{$category->type}}</option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                    <input type="text"class="form-control" placeholder="Name" name="name" value="{{$product->name}}" required>
                    </div>
                    <div class="form-group">
                        <label>Code</label>
                    <input type="text"class="form-control" placeholder="Code" name="code" value="{{$product->code}}" required>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input class="form-control" type="text" placeholder="Price" name="price" value="{{$product->price}}" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" placeholder="Description" name="description" value="{{$product->description}}">
                        </textarea>
                    </div>
                    <hr>
                    <h2>Details</h2>
                    <div class="form-group">
                        <label>Material</label>
                        <input class="form-control" type="text"placeholder="Material" name="material" value="{{$product->details->material}}" required>
                    </div>
                    <div class="form-group">
                        <label>Composition</label>
                        <input class="form-control"type="text" placeholder="Composition" value="{{$product->details->composition}}" name="composition">
                    </div>
                    <div class="form-group">
                        <label>Quantity</label>
                        <input class="form-control"type="number" placeholder="Quantity" name="quantity" min="0" value="{{$product->details->quantity}}" required>
                    </div>
                    <div class="form-group">
                        <label>Width</label>
                        <input class="form-control"type="text" placeholder="Width" name="width" value="{{$product->details->width}}">
                    </div>
                    <div class="form-group">
                        <label>Depth</label>
                        <input class="form-control"type="text" placeholder="Depth" name="depth" value="{{$product->details->depth}}">
                    </div>
                    <div class="form-group">
                        <label>Weight</label>
                        <input class="form-control"type="text" placeholder="Weight" name="weight" value="{{$product->details->weight}}">
                    </div>
                    <hr>
                    <h2>Images</h2>
                    <div class="form-group">
                        <label>Images from file system</label>
                        <input class="form-control" type="file" placeholder="Images" name="images[]"  multiple>
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
