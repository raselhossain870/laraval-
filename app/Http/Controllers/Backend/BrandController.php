<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use File;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.brand.manage');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.brand.create');
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
        $brand=new Brand();
        $brand->name=$request->name;
        $brand->slug=Str::slug($request->name);
        $brand->description=$request->description;
        $brand->is_featured=$request->is_featured;
        $brand->status=$request->status;


        if ($request->image)
        {
           $image=$request->file('image');
           $img=rand().'.'.$image->getClientOriginalExtension();
           $location=public_path('Backend/img/brand'.$img);
           Image::make($image)->save($location);
           $brand->image=$img;
        }
        $brand->save();
        return redirect()->route('brand.manage');

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
        //
    }

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
        //
    }
}
