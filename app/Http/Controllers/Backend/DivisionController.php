<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Division;
use App\Models\Backend\District;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use File;


class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $divisions = Division::orderBy('priority','asc')->get();
        return view('backend.pages.division.manage',compact('divisions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.division.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $division = new Division();
       $division->name =$request->name;
       $division->priority  =$request->priority;
       $division->save();
       return redirect()->route('division.manage');
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
        $division = Division::find($id);
        if (!is_null($division))
        {
        return view('backend.pages.division.edit',compact('division'));
        }
        else{
            return back();

    }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $division = Division::find($id);
        $division->name          =$request->name;
        $division->priority      =$request->priority;
        $division->save();
        return redirect()->route('division.manage');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $division = Division::find($id);
        if (!is_null($division))
        {
            $districts = District::where('division_id',$division->id)->get();
            foreach($districts as $district){
                $district->delete();
            }
            $division->delete();
        }
        return redirect()->route('division.manage');


    }

}
