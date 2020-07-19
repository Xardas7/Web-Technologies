<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Product;
use App\Detail;
use Illuminate\Support\Facades\Storage;


class ProductsController extends Controller
{

    /**
     * user controllers
     */

    function index(){
        if(request('email')!=null) {
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
        return view('admin.forms.product.create');
    }

    protected function store(Request $request)
    {
        $validate = $request->validate([
            'images[]' => 'mimes:jpeg,jpg,png,svg,webp',

        ]);

        /* logica creazione prodotto */

        /*
        .
        .
        . 
        */

        if($request->hasFile('images')){
            foreach($request->images as $image){
                    $fileClientName = $image->getClientOriginalName();
                    $path = $image->storeAs('products', $fileClientName);   
                    }

        /* Qui devi collegare ogni path al prodotto, esempio
             $product->images()->Create([
                   'path' => $path
            
                ]);
    
        */
        }
        return redirect()->back();
           
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
