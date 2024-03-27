@extends('backend.layout.template')
@section('body')

<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
<div>
    <h4> Update A Product</h4>
    <p class="mg-b-0"> Do bigger this side i like it </p>
</div>
</div>

<div class="card shadow-base bd-0 pd-30 mg-t-20">
<div class="d-md-flux justify-content-between align-items-center" >
<div>
<h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Create A New Product</h6>
</div>
</div>


<form action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
@csrf

<div class="row">

<div class="col-lg-4">
<div class="form-group">
    <label>Product Title</label>
    <input type="text" name="title" class="form-control" required="required" value="{{$product->title}}">
</div>

<div class="form-group">
<label>Regular Price</label>
<input type="text" name="regular_price" class="form-control" required="required" value="{{$product->regular_price}}">
</div>


<div class="form-group">
<label> Offer Price </label>
<input type="text" name="offer_price" class="form-control" required="required" value="{{$product->offer_price}}">
</div>

<div class="form-group">
<label>Quantity</label>
<input type="text" name="quantity" class="form-control" required="required" value="{{$product->quantity}}">
</div>

<div class="form-group">
<label>Sku Code</label>
<input type="text" name="sku_code" class="form-control" required="required" value="{{$product->sku_code}}">
</div>

<div class="form-group">
<label>Tags</label>
<input type="text" name="tags" class="form-control" required="required" value="
{{$product->tags}}">
</div>
</div>

<div class="col-lg-4">

<div class="form-group">
<label>Featured Product</label>
<select class="form-control" name="featured_item">
    <option>Please Select The featured Status</option>
<option value="1"
@if($product->featured_item==1)
    selected
    @endif>Yes </option>
<option value="0" @if($product->featured_item==0)
    selected
    @endif> No
</option>
</select>
</div>

<div class="form-group">
<label>Product Brand</label>
<select name="brand_id" class="form-control">
    <option> Please Select The product brand </option>

 @foreach (App\Models\Backend\Brand::orderBy('name','asc')->get() as $parentcat)
 <option value="{{$parentcat->id}}"
 @if($product->brand_id == $parentcat->id)
 selected
 @endif>{{$parentcat->name}}</option>
@endforeach
</select>
</div>


<div class="form-group">
<label>Product Category</label>
<select name="category_id" class="form-control">
    <option>Please Select The product Category</option>
 @foreach (App\Models\Backend\Category::orderBy('name','asc')->where('is_parent',0)->get() as $parentcat)
 <option value="{{$parentcat->id}}"
 @if($product->category_id == $parentcat->id)
 selected
 @endif>{{$parentcat->name}} </option>

 <!-- @foreach (App\Models\Backend\Category::orderBy('name','asc')->where('is_parent',$parentcat->id->get() as $childcat)
 <option value="{{$childcat->id}}"
 @if($product->category_id == $childcat->id)
 selected
 @endif>{{$childcat->name}}</option>
@endforeach -->
@endforeach
</select>
</div>



<div class="form-group">
<label> Product Type/Condition </label>
   <select name="product_type" class="form-control">
<option value="1"
@if($product->product_type == 1)
    selected
    @endif>Pre_owned
</option>
<option value="0" @if($product->product_type == 0)
    selected
    @endif>New
</option>
</select>
</div>

<div class="form-group">
<label>Status</label>
   <select name="status" class="form-control">
    <option>Please Select User Account Status</option>
<option value="1" @if($product->product_type == 1)
    selected
    @endif>Active
</option>
<option value="0" @if($product->product_type == 0)
    selected
    @endif>Inactive
</option>
</select>
</div>
</div>

<div class="col-lg-4">
<div class="form-group">
<label>Product Short Description</label>
<textarea class="form-control" name="short_desc" rows="5">{{$product->short_desc}}</textarea>
</div>

<div class="form-group">
<label>Product Description</label>
<textarea class="form-control" name="desc" rows="5">{{$product->desc}}</textarea>
</div>

<div class="form-group">
<label>Product logo/Image</label>
<br>
@if(!is_null($product->image))
<img src="{{asset(backend/img/product)}}/{{$product->image}}" width="80">
@else
No Thumbnail
@endif
<br> <br>
<input type="file" name="image" class="form-control-file">
</div>
</div>
</div>

<div class="row">
<div class="col-lg-4 offset-lg-4">
<div class="form-group">
    <input type="submit" name="addCategory" class="btn btn-block btn-primary btn-flat" value="Save Changes">
</div>
</div>
</div>
</form>
</div>


@endsection
