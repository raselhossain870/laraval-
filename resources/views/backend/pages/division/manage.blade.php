@extends('backend.layout.template')
@section('body')

<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
<div>
    <h4> Mange All Divisions</h4>
    <p class="mg-b-0"> Do bigger this side i like it </p>
</div>
</div>
<div class="card shadow-base bd-0 pd-25 mg-t-20">
<div class="d-md-flux justify-content-between align-items-center" >
<div>
<h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Manage All Division</h6>
</div>
</div>

<div class="bd rounded table-responsive">
    <table class="table table-bordered table-striped table-hover" cellspacing="0" width="100%">
<thead>
<tr>
<th>#SI</th>

<th>Name</th>
<th>Priority</th>
<th>Action</th>
</tr>
</thead>
<tbody>

@php $i=1; @endphp
@foreach($divisions as $division)


<!-- <tr>
<th scope="row">{{$i}}</th>
<td>
  @if(!is_null($division->image))
  <img src="{{asset('backend/img/division')}}/{{$division->image}}" width="40">
  @else
  No Thumbnail
  @endif
</td> -->

<td>{{$division->name}}</td>
<td>{{$division->slug}}</td>
<!-- <td>{{$division->description}}</td> -->

<td>
@if($division->is_featured==1)
<span class="badge badge-success">Yes</span>
@else
<span class="badge badge-warning">No</span>
@endif
</td>

<td>
@if($division->status==1)
<span class="badge badge-success">Active</span>
@else
<span class="badge badge-warning">Inactive</span>
@endif
</td>
<td>
<a class="btn btn-info btn-sm" href="{{route('division.edit',$division->id)}}">
<i class="fas fa-pencil-alt"></i>
</a>
<a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#deleteDivision{{$division->id}}">
<i class="fas fa-trash"></i>
</a>

<div class="modal fade" id="deleteDivision{{$division->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">


<h5 class="modal-title" id="exampleModalLabel"> Delete this information </h5>
<button type="button" class="close" data-dismiss="modal" aria-label="close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<ul>
<li><a href="{{route('division.destroy', $division->id)}}" class="btn btn-danger">Delete</a></li>
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


@endsection
