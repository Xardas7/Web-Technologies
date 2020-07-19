<?php

namespace App\Http\Controllers\Admin;
use App\Producer;
use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MainProducerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:producer']);
    }

    function dashboard()
    {
        $products = Product::where('producer_id', Auth::user()->id)->get();
        if (request('code') != null) {
            $key = request('code');
            $products = $products->where('code', $key)->get();
            return view('admin.forms.product.index', compact('products'));
        } else {

            return view('admin.forms.product.index', compact('products'));
        }
    }
        function create()
        {
            $producers = Producer::all();
            $categories_female = Category::distinct()->select('name')->where('gender', 'female')->get();
            $categories_male = Category::distinct()->select('name')->where('gender', 'male')->get();
            $categories_type_male = Category::where('gender', 'male')->get();
            $categories_type_female = Category::where('gender', 'female')->get();

            return view('admin.forms.product.create', compact('producers', 'categories_female', 'categories_male', 'categories_type_female', 'categories_type_male'));
        }

    protected function store(Request $request)
    {
        $validate = $request->validate([
        'images[]' => 'mimes:jpeg,jpg,png,svg,webp',
        'producer_id' => 'integer',
        'category_id' => 'integer',
        'name' => 'unique:products|string',
        'description' => 'string',
        'material' => 'string',
        'composition' => 'nullable|string',
        'quantity' => 'integer',
        'width' => 'nullable|integer',
        'depth' => 'nullable|integer',
        'weight' => 'nullable|integer',
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
    protected function update(Request $request)
    {

        $user= User::findOrFail($request->id);
        $user->name=$request['name'];
        $user->email=$request['email'];
        $user->surname=$request['surname'];
        $user->birth_date=$request['birth_date'];
        $user->sex=$request['sex'];
        if($request->password != 'passwordnoncambiata'){
            $user->password = Hash::make($request['password']);

        }

        $user->save();
        return redirect()->route('users.index')->with('success', 'User '. $request->email.' updated!');

    }

    protected function edit($id)
    {
        $product= Product::findOrFail($id);
        return view('admin.forms.product.edit',compact('product'));

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
