@extends('backend.layout.template')
@section('body')

<div class="br-pagetitle">
<i class="icon ion-ios-home-outline"></i>
<div>
    <h4>Create A New District</h4>
<p class="mg-b-0">Do bigger things with Bracket plus</p>
</div>
</div>


<div class="card shadow-base bd-0 pd-25 mg-t-20">
<div class="d-md-flex justify-content-between align-items-center"><div>
<h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1"> Create A New District</h6>
</div>
</div>




<div class="row">
<div class="col-lg-6">
  <form action="{{route('district.store')}}" method="POST" enctype="multipart/form-data">
@csrf
<div class="form-group">
<label>District Name</label>
<input type="text" name="name" class="form-control" required="required">
</div>

<div class="form-group">
<label>District Descriptions</label>
<textarea class="form-control" name="description" rows="7"></textarea>
</div>
</div>


<div class="col-lg-6">
<div class="form-group">
 <label>Is Featured</label>
 <select class="form-control" name="is_featured">
<option>Please Select One Option</option>
<option value="1">Yes Featured</option>
<option value="0">Not Featured</option>
</select>
</div>



<div class="form-group">
 <label>Status</label>
 <select name="status" class="form-control">
<option>Please Select User Account Status</option>
<option value="0">Inactive</option>
<option value="1">Active</option>
</select>
</div>

<div class="form-group">
 <label>District logo/Image</label>
 <input type="file" name="image" class="form-control-file">
</div>


<div class="form-group">
<input type="submit" name="addUser" class="btn btn-block btn-primary btn-flat" value="Add New District">
</div>
</form>
</div>
</div>


</div>

@endsection
