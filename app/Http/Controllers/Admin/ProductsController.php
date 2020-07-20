<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Product;
use App\Producer;
use App\Image;
use App\Category;
use App\Detail;
use Alert;
use Illuminate\Support\Facades\Storage;


class ProductsController extends Controller
{

    /**
     * user controllers
     */
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }
    function index(){
        if(request('code')!=null) {
            $key = request('code');
            $products = Product::where('code', $key)->get();
            return view('admin.forms.product.index',compact('products'));
        }
        else {

           $products = Product::all();
            return view('admin.forms.product.index',compact('products'));
        }
    }

    function create(){
        $producers = Producer::all();
        $categories_female = Category::distinct()->select('name')->where('gender','female')->get();
        $categories_male = Category::distinct()->select('name')->where('gender','male')->get();
        $categories_type_male = Category::where('gender','male')->get();
        $categories_type_female = Category::where('gender','female')->get();

        return view('admin.forms.product.create',compact('producers','categories_female','categories_male', 'categories_type_female', 'categories_type_male'));
    }

    protected function store(Request $request)
    {

        $validate = $request->validate([
            'images[]' => 'mimes:jpeg,jpg,png,svg,webp',
            'producer_id' => 'integer',
            'category_type' => 'integer',
            'name' => 'unique:products|string',
            'description' => 'nullable|string',
            'material' => 'string',
            'composition' => 'nullable|string',
            'quantity' => 'integer',
            'width' => 'nullable',
            'depth' => 'nullable',
            'weight' => 'nullable',
            'code' => 'unique:products|alpha_num',
        ]);

        $product = Product::create([
            'category_id' => $request->category_type,
            'producer_id' => $request->producer_id,
            'code' => $request->code,
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        $product->details()->create([
            'material' => $request->material,
            'composition' => $request->composition,
            'quantity' => $request->quantity,
            'width' => $request->width,
            'weight' => $request->weight,
            'depth' => $request->depth,
        ]);


        if($request->hasFile('images')){
            $files = $request->file('images');
            foreach($files as $image){
                    $fileClientName = $image->getClientOriginalName();
                    $path = $image->storeAs('products', $fileClientName);
                      $image = Image::create([
                    'product_id' => $product->id,
                    'path' => $path
                    ]);
                    }
        }

        alert()->success('Product','Product added succesfully')
        ->toToast()
        ->animation('animate__backInRight','animate__backOutRight')
        ->autoClose(3000)
        ->timerProgressBar();
        session()->flash('message', 'Product was created!');
        return redirect()->route('product.create');

            // $product->images()->updateOrCreate(
            //     ['product_id' => $product->id],
            //     ['path' => $path]
            // );

    }
    protected function update(Request $request,$id)
    {

        $validate = $request->validate([
            'images[]' => 'nullable|mimes:jpeg,jpg,png,svg,webp',
            'producer_id' => 'integer',
            'category_id' => 'integer',
            'name' => 'string',
            'description' => 'nullable|string',
            'material' => 'string',
            'composition' => 'nullable|string',
            'quantity' => 'integer',
            'width' => 'nullable',
            'depth' => 'nullable',
            'weight' => 'nullable',
            'code' => 'alpha_num',
        ]);

        $product = Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->code = $request->code;
        $product->price = $request->price;
        $product->category_id = $request->category_type;
        $product->producer_id = $request->producer_id;
        $product->save();



        $product->details()->updateOrCreate(
            ['product_id' => $product->id],
            [
            'material' => $request->material,
            'composition' => $request->composition,
            'quantity' => $request->quantity,
            'width' => $request->width,
            'weight' => $request->weight,
            'depth' => $request->depth,
        ]);


        if($request->hasFile('images')){
            $files = $request->file('images');
            foreach($files as $image){
                    $fileClientName = $image->getClientOriginalName();
                    $path = $image->storeAs('products', $fileClientName);  
                      $image = Image::create([
                    'product_id' => $product->id,
                    'path' => $path
                    ]);
                    }
        }
        
        alert()->success('Product','Product added succesfully')
        ->toToast()
        ->animation('animate__backInRight','animate__backOutRight')
        ->autoClose(3000)
        ->timerProgressBar();
        session()->flash('message', 'Product was updated!');
        return redirect()->route('product.create');
           
            // $product->images()->updateOrCreate(
            //     ['product_id' => $product->id],
            //     ['path' => $path]
            // );


    }

    protected function edit($id)
    {
        $product= Product::findOrFail($id);
        $producers = Producer::all();
        $categories_female = Category::distinct()->select('name')->where('gender','female')->get();
        $categories_male = Category::distinct()->select('name')->where('gender','male')->get();
        $categories_type_male = Category::where('gender','male')->get();
        $categories_type_female = Category::where('gender','female')->get();

        return view('admin.forms.product.edit',compact('product','producers','categories_female','categories_male', 'categories_type_female', 'categories_type_male'));

    }
    protected function details($id)
    {
        $details= Detail::where('product_id',$id)->get();
        return view('admin.forms.product.details',compact('details'));

    }

    protected function delete(Request $request)
    {
        $product=Product::findOrFail($request->id);
        $code=$product->code;
        $product->delete();
        return back()->with('success', 'Product '. $code.' deleted!');
    }

}
