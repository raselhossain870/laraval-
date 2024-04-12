<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Backend\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */

    public function index()
    {
        $sliders = Slider::orderBy('id','asc')->get();
        return view('backend.pages.slider.manage',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $slider = new Slider();
        $slider->title = $request->title;
        $slider->subtitle = $request->subtitle;
        $slider->description = $request->description;
        $slider->button_text = $request->button_text;
        $slider->button_url = $request->button_url;

        if ($request->image)
        {
            $image = $request->file('image');
            $img = rand().'.'.$image->getClientOriginalExtension();
            $location = public_path('backend/img/slider/'.$img);
            Image::make($image)->save($location);
            $slider->image = $img;
         }
         $slider->save();
         return redirect()->route('slider.manage');


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
        $slider = Slider::find($id);
        if (!is_null($slider))
        {
        return view('backend.pages.slider.edit',compact('slider'));
        }
        else{
            return redirect()->route('slider.manage');

    }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $slider = Slider::find($id);
        $slider->title = $request->title;
        $slider->subtitle = $request->subtitle;
        $slider->description = $request->description;
        $slider->button_text = $request->button_text;
        $slider->button_url = $request->button_url;

        if (!is_null($request->image))
        {
            if (File::exists('backend/img/slider/'.$slider->image)){
                File::delete('backend/img/slider/'.$slider->image);
            }

           $image = $request->file('image');
           $img = rand().'.'.$image->getClientOriginalExtension();
           $location = public_path('backend/img/slider/'.$img);
           Image::make($image)->save($location);
           $slider->image = $img;
        }
        $slider->save();
        return redirect()->route('slider.manage');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::find($id);
        if (!is_null($slider))
        {
            if (File::exists('backend/img/slider/'.$slider->image))
            {
                File::delete('backend/img/slider/'.$slider->image);
            }
           $slider->delete();
            return redirect()->route('slider.manage');
    }

            else {
            return redirect()->route('slider.manage');
    }
    }
}
