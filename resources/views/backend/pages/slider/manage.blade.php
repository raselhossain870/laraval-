@extends('backend.layout.template')
@section('body')

<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
<div>
    <h4> Mange All Sliders</h4>
    <p class="mg-b-0"> Do bigger this side i like it </p>
</div>
</div>

<div class="card shadow-base bd-0 pd-25 mg-t-20">
<div class="d-md-flux justify-content-between align-items-center" >
<div><h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Manage All Sliders</h6>
</div>
</div>

<div class="bd rounded table-responsive">
    <table class="table table-bordered table-striped table-hover" cellspacing="0" width="100%">

<thead>
<tr>
<th>#SI</th>
<th>Title</th>
<th>Subtitle</th>
<th>Description</th>
<th>Image</th>
<th>Button_Text</th>
<th>Button_URL</th>
<th>Action</th>
</tr>
</thead>
<tbody>

@php $i=1; @endphp
@foreach($sliders as $slider)


<tr>
<th scope="row">{{$i}}</th>
<td>{{$slider->title}}</td>
<td>{{$slider->subtitle}}</td>
<td>{{$slider->description}}</td>
<td>
  @if( !is_null($slider->image))
  <img src="{{asset('backend/img/slider')}}/{{$slider->image}}" width="40">
  @else
  No Thumbnail
  @endif
</td>

<td>{{$slider->button_text}}</td>
<td>{{$slider->button_url}}</td>


<td>
<a class="btn btn-info btn-sm" href="{{route('slider.edit',$slider->id)}}">
<i class="fas fa-pencil-alt"></i>
</a>
<a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#deleteSlider{{$slider->id}}">
<i class="fas fa-trash"></i>
</a>


<div class="modal fade" id="deleteSlider{{$slider->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel"> Delete this information </h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>



<div class="modal-body">
<ul>
<li><a href="{{route('slider.destroy', $slider->id)}}" class="btn btn-danger">Delete</a></li>
<li><button type="button" class="btn btn-primary" data-dismiss="modal">Cancel
</button>
</li>
</ul>
</div>
</div>
</div>
</div>
</td>


</tr>


@php $i++; @endphp
@endforeach
</tbody>
</table>
</div>

</div>

@endsection
