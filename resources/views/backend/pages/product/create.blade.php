@extends('backend.layout.template')
@section('body')

<div class="br-pagetitle">
<i class="icon ion-ios-home-outline"></i>
<div>
    <h4>Create A New Product</h4>
<p class="mg-b-0">Do bigger things with Bracket plus</p>
</div>
</div>


<div class="card shadow-base bd-0 pd-25 mg-t-20">
<div class="d-md-flex justify-content-between align-items-center"><div>
<h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1"> Create A New Product</h6>
</div>
</div>





  <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
@csrf

<div class="row">

<div class="col-lg-4">
<div class="form-group">
<label>Product Title</label>
<input type="text" name="name" class="form-control" required="required">
</div>

<div class="form-group">
<label> Regular Price</label>
<input type="text" name="regular_price" class="form-control" required="required">
</div>


<div class="form-group">
<label> Offer Price</label>
<input type="text" name="offer_price" class="form-control">
</div>

<div class="form-group">
<label>Quantity</label>
<input type="text" name="quantity" class="form-control" required="required">
</div>

<div class="form-group">
<label>Sku Code</label>
<input type="text" name="sku_code" class="form-control" required="required">
</div>

<div class="form-group">
<label>Tags</label>
<input type="text" name="tags" class="form-control">
</div>
</div>

<div class="col-lg-4">
<div class="form-group">
 <label>Featured Product</label>
 <select name="featured_item" class="form-control">
<option>Please Select the featured status</option>
<option value="0">Normal</option>
<option value="1">Featured</option>
</select>
</div>



<div class="form-group">
 <label>Product Brand</label>
 <select name="brand_id" class="form-control">
<option>Please Select the product brand</option>
@foreach(App\Models\Backend\Brand::orderBy('name','asc')->get() as $parentcat)
<option value="{{$parentcat->id}}">{{$parentcat->name}}</option>
@endforeach
</select>
</div>

<div class="form-group">
 <label>Product Category</label>
 <select name="category_id" class="form-control">
<option>Please Select the product category</option>
@foreach(App\Models\Backend\Category::orderBy('name','asc')->where('is_parent',0)->get() as $parentcat)
<option value="{{$parentcat->id}}">{{$parentcat->name}}</option>
@foreach(App\Models\Backend\Category::orderBy('name','asc')->where('is_parent',$parentcat->id)->get() as $childcat)
<option value="{{$childcat->id}}">--{{$childcat->name}}</option>
@endforeach
@endforeach
</select>
</div>


<div class="form-group">
 <label>Product Type/Condition</label>
 <select name="product_type" class="form-control">
<option> Please Select Product Type/Condition</option>
<option value="0">New</option>
<option value="1">Pre_owned</option>
 </select>
</div>

<div class="form-group">
 <label> Status</label>
 <select name="status" class="form-control">
<option> Please Select Product status</option>
<option value="0">New</option>
<option value="1">Pre_owned</option>
 </select>
</div>

    <div class="form-group">
  <label>Product logo/Image</label>
<input type="file" name="image" class="form-control-file">
</div>

<div class="form-group">
<input type="submit" name="addcategory" class="btn btn-block btn-primary btn-flat" value="Add  New Product" >
</div>





</div>
</div>

</form>
</div>


@endsection
