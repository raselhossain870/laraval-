@extends('backend.layout.template')
@section('body')

<div class="br-pagetitle">
<i class="icon ion-ios-home-outline"></i>
<div>
    <h4>Create A New Slider</h4>
<p class="mg-b-0">Do bigger things with Bracket plus</p>
</div>
</div>


<div class="card shadow-base bd-0 pd-25 mg-t-20">
<div class="d-md-flex justify-content-between align-items-center"></div>
<div><h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1"> Create A New Slider</h6>
</div>


<div class="row">
<div class="col-lg-10">
  <form action="{{route('slider.store')}}" method="POST" enctype="multipart/form-data">
@csrf

<div class="form-group">
<label>Slider Title</label>
<input type="text" name="title" class="form-control" required="required">
</div>

<div class="form-group">
<label>SubTitle</label>
<input type="text" name="subtitle" class="form-control" required="required">
</div>

<div class="form-group">
<label> Slider Descriptions</label>
<textarea class="form-control" name="description" rows="7"></textarea>
</div>


<div class="form-group">
<label>Button_Text </label>
<input type="text" name="button_text" class="form-control" required="required">
</div>

<div class="form-group">
<label>Button_URL </label>
<input type="text" name="button_url" class="form-control" required="required">
</div>

<div class="form-group">
 <label>Slider Image</label>
 <input type="file" name="image" class="form-control-file">
</div>




<div class="form-group">
<input type="submit" name="addUser" class="btn btn-block btn-primary btn-flat" value="Add New Slider">
</div>
</form>
</div>
</div>
</div>





@endsection
