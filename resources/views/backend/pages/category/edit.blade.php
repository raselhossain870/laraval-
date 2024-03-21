@extends('backend.layout.template')
@section('body')

<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
<div>
    <h4> Update A Category</h4>
    <p class="mg-b-0"> Do bigger this side i like it </p>
</div>
</div>

<div class="card shadow-base bd-0 pd-30 mg-t-20">
<div class="d-md-flux justify-content-between align-items-center" >
<div>
<h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Create A New Category</h6>
</div>
</div>



<div class="row">
                <div class="col-lg-6">
<form action="{{route('category.update',$category->id)}}" method="POST" enctype="multipart/form-data">
@csrf
<div class="form-group">
    <label>Category Name</label>
    <input type="text" name="name" class="form-content" required="required" value="{{$category->name}}">
</div>

<div class="form-group">
<label>Category Description</label>
<textarea class="form-control" name="description" rows="7">{{$category->description}}</textarea>
</div>
</div>


        <div class="col-lg-6">

        <div class="form-group">
 <label>Is Parent</label>
 <select class="form-control" name="is_parent">
<option value="0">Please Select One Option if any</option>
@foreach(App\Models\Backend\Category::orderBy('name','asc')->where('is_parent',0)->get() as $parentcat)
<option value="{{$parentcat->id}}"> {{$parentcat->name}}</option>

@foreach(App\Models\Backend\Category::orderBy('name','asc')->where('is_parent',$parentcat->id)->get() as $childcat)
<option value="{{$parentcat->id}}"> {{$childcat->name}}</option>
@endforeach
@endforeach
</select>
</div>

<div class="form-group">
<label>Status</label>
<select name="status" class="form-control">
    <option>Please Select User Account Status</option>
<option value="1" @if($category->status==1)
selected
@endif>Active</option>

<option value="0" @if($category->status==0)
selected
@endif>Inactive</option>
</select>
</div>

<div class="form-group">
<label>Brand logo/Image</label><br>
@if(!is_null($category->image))
<img src="{{asset('backend/img/category')}}/{{$category->image}}" width="80">
@else
No Thumbnail
@endif
<br><br>
<input type="file" name="image" class="form-control-file">
</div>

<div class="form-group">
    <input type="submit" name="addUser" class="btn btn-block btn-primary btn-flat" value="Save changes">
        </div>
</form>
</div>
</div>
</div>

@endsection
