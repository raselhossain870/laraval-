<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Backend\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use File;

class ProductController extends Controller
{
    // @return \Illuminate\Http\Response
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('title','asc')->get();
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

        $product=new Product();
        $product->title = $request->title;
        $product->slug=Str::slug($request->title);
        $product->short_desc=$request->short_desc;
        $product->desc=$request->desc;
        $product->tags = $request->tags;
        $product->quantity = $request->quantity;
        $product->regular_price = $request->regular_price;
        $product->offer_price = $request->offer_price;
        $product->sku_code = $request->sku_code;
        $product->product_type = $request->product_type;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->featured_item = $request->featured_item;
        $product->status=$request->status;


        if ($request->image)
        {
           $image = $request->file('image');
           $img = rand().'.'.$image->getClientOriginalExtension();
           $location = public_path('backend/img/product/'.$img);
           Image::make($image)->save($location);
           $product->image = $img;
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

    }
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product= Product::find($id);
        $product->title = $request->title;
        $product->slug=Str::slug($request->title);
        $product->short_desc=$request->short_desc;
        $product->desc=$request->desc;
        $product->tags = $request->tags;
        $product->quantity = $request->quantity;
        $product->regular_price = $request->regular_price;
        $product->offer_price = $request->offer_price;
        $product->sku_code = $request->sku_code;
        $product->product_type = $request->product_type;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->featured_item = $request->featured_item;
        $product->status=$request->status;


        if (!is_null($request->image)){
        if (File::exists('backend/img/product/'.$product->image)){
            File::delete('backend/img/product/'.$product->image);
        }
        $image = $request->file('image');
        $img = rand().'.'.$image->getClientOriginalExtension();
        $location = public_path('backend/img/product/'.$img);
        Image::make($image)->save($location);
        $product->image = $img;
        }
        $product->save();
        return redirect()->route('product.manage');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        if (!is_null($product)){
            if (File::exists('backend/img/product/'.$product->image)){
                File::delete('backend/img/product/'.$product->image);
            }
           $product->delete();
            return redirect()->route('product.manage');
    }

            else{
            return redirect()->route('product.manage');
    }
}
}


