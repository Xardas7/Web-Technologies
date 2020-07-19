<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Size;
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

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        foreach($categories as $category) {
            $sizes = $category->sizes;
            $size_string = '';
            foreach ($sizes as $size) {
                $size_string .= ' '.$size->size . ',';
            }
            $size_string_trimmed = rtrim($size_string, ',');
            $category['sizes'] = $size_string_trimmed;
        }
        return view('admin.forms.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sizes = Size::all();
        return view('admin.forms.category.create', compact('sizes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'string',
            'gender' => 'string',
            'type' => 'string',
            'sizes' => 'string'
        ]);

        $category_name = $request->name;
        $category_gender = $request->gender;
        $category_type = $request->type;

        $sizes_array = explode(',', rtrim($request->sizes, ','));
        $sizes_ids = array();
        foreach($sizes_array as $size_string){
            $size = Size::where('size',$size_string)->first();
            $sizes_ids[] = $size->id;
        }

        $category = Category::create([
            'name' => $category_name,
            'gender' => $category_gender,
            'type' => $category_type
        ]);

            $category->sizes()->sync($sizes_ids);

            return redirect()->route('admin.category.index')->with('success', 'Category added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $sizes = $category->sizes;
        $size_string = '';
        foreach($sizes as $size){
            $size_string .= $size->size.',';
        }
        $size_string = rtrim($size_string, ',');
        return view('admin.forms.category.edit', ['category' => $category, 'sizes' => $size_string]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => 'string',
            'gender' => 'string',
            'type' => 'string',
            'sizes' => 'string'
            ]);

        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->gender = $request->gender;
        $category->type = $request->type;
        $category->save();

        $sizes_array = explode(',', rtrim($request->sizes, ','));
        $sizes_ids = array();
        foreach($sizes_array as $size_string){
            if($size_string) {
                $size = Size::where('size', $size_string)->first();
                $sizes_ids[] = $size->id;
            }
        }

        $category->sizes()->sync($sizes_ids);

        return redirect()->route('admin.category.index')->with('success', 'Category updated!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return back()->with('success', 'Category deleted!');
    }
}
