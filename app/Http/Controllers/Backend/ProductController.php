<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('name','asc')->get();
        return view('backend.pages.product.manage',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.product.create');
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
        $product=new Product();
        $product->name=$request->name;
        $product->slug=Str::slug($request->name);
        $product->description=$request->description;
        $product->is_featured=$request->is_featured;
        $product->status=$request->status;


        if ($request->image)
        {
           $image=$request->file('image');
           $img=rand().'.'.$image->getClientOriginalExtension();
           $location=public_path('backend/img/product/'.$img);
           Image::make($image)->save($location);
           $product->image=$img;
        }
        $product->save();
        return redirect()->route('product.manage');
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
        $product = Product::find($id);
        if (!is_null($product))
        {
        return view('backend.pages.product.edit',compact('product'));
        }
        else{
            return redirect()->route('product.manage');

    }}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        if (!is_null($product)){
            if (File::exists('Backend/img/product/'.$product->image)){
                File::delete('Backend/img/product/'.$product->image);
            }
           $product->delete();
            return redirect()->route('product.manage');
    }

            else{
            return redirect()->route('product.manage');
    } }}


