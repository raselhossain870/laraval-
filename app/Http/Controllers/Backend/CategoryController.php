<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $catagories = Category::orderBy('name','asc')->get();
        return view('backend.pages.category.manage',compact('catagories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:255',
        ],

        ['name.required'=>'Please insert the Brand name',
        ]
    );


$category = new Category();
$category->name = $request->name;
$category->slug = Str::slug($request->name);
$category->description = $request->description;
$category->is_parent= $request->is_parent;
// $category->featured = $request->featured;
$category->status = $request->status;

if ($request->image){
           $image= $request->file('image');
           $img= rand().'.'.$image->getClientOriginalExtension();
           $location= public_path('backend/img/category/'.$img);
           Image::make($image)->save($location);
           $category->image= $img;
        }

        $category->save();
        return redirect()->route('category.manage');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        if (!is_null($category))
        {
        return view('backend.pages.category.edit',compact('category'));
        }
        else{
            return redirect()->route('category.manage');

    }

        }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'name'=>'required|max:255',
        ],

        ['name.required'=>'Please insert the Category name',

        ]
    );
        $category = category::find($id);
        $category->name=$request->name;
        $category->slug=Str::slug($request->name);
        $category->description=$request->description;
        $category->is_parent=$request->is_parent;
        // $category->featured=$request->featured;
        $category->icon_class=$request->icon_class;
        $category->status=$request->status;
if (!is_null($request->image)){
if (File::exists('backend/img/category/'.$category->image)){
    File::delete('backend/img/category/'.$category->image);
}
$image = $request->file('image');
$img = rand().'.'.$image->getClientOriginalExtension();
$location = public_path('backend/img/category/'.$img);
Image::make($image)->save($location);
$category->image = $img;
}
$category->save();
return redirect()->route('category.manage');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        if (!is_null($category)){
            if (File::exists('Backend/img/category/'.$category->image)){
                File::delete('Backend/img/category/'.$category->image);
            }
           $category->delete();
            return redirect()->route('category.manage');
    }

            else{
            return redirect()->route('category.manage');
    }}}

