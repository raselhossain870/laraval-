@extends('backend.layout.template')
@section('body')

<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
<div>
    <h4> Update A Slider</h4>
    <p class="mg-b-0"> Do bigger this side i like it </p>
</div>
</div>

<div class="card shadow-base bd-0 pd-30 mg-t-20">
<div class="d-md-flux justify-content-between align-items-center" >
<div>
<h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Create A New Slider</h6>
</div>
</div>



<div class="row">
                <div class="col-lg-6">
<form action="{{route('slider.update',$slider->id)}}" method="POST" enctype="multipart/form-data">
@csrf

<div class="form-group">
<label>Slider Title</label>
<input type="text" name="title" class="form-control" required="required" value="{{$slider->title}}">
</div>

<div class="form-group">
<label>SubTitle</label>
<input type="text" name="subtitle" class="form-control" required="required" value="{{$slider->subtitle}}">
</div>



<div class="form-group">
<label> Slider Descriptions</label>
<textarea class="form-control" name="description" rows="7"></textarea>
</div>

<div class="form-group">
<label>Button_Text </label>
<input type="text" name="button_text" class="form-control" required="required" value="{{$slider->button_text}}">
</div>

<div class="form-group">
<label>Button_URL </label>
<input type="text" name="button_url" class="form-control" required="required" value="{{$slider->button_url}}">
</div>

<div class="form-group">
<label>Slider Image </label>
<input type="text" name="image" class="form-control" required="required" value="{{$slider->image}}">
</div>


<div class="form-group">
<label>Slider Image</label><br>

@if(!is_null($slider->image))
<img src="{{asset('backend/img/slider')}}/{{$slider->image}}" width="80">
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
