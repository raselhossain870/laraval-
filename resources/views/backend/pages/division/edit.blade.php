@extends('backend.layout.template')
@section('body')

<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
<div>
    <h4> Update A Division</h4>
    <p class="mg-b-0"> Do bigger this side i like it </p>
</div>
</div>

<div class="card shadow-base bd-0 pd-30 mg-t-20">
<div class="d-md-flux justify-content-between align-items-center" >
<div>
<h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Create A New Division</h6>
</div>
</div>



<div class="row">
                <div class="col-lg-6">
<form action="{{route('division.update',$division->id)}}" method="POST" enctype="multipart/form-data">
@csrf

<div class="form-group">
    <label>Division Name</label>
    <input type="text" name="name" class="form-content" required="required" value="{{$division->name}}">
</div>

<div class="form-group">
<label>Priority</label>
<input type="text" name="priority" class="form-control" required="required">
</div>


        

<div class="form-group">
    <input type="submit" name="addUser" class="btn btn-block btn-primary btn-flat" value="Save changes">
        </div>
</form>
</div>
</div>
<!-- </div> -->

@endsection
