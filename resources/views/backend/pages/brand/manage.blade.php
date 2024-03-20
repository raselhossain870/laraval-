@extends('backend.layout.template')
@section('body')

<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
<div>
    <h4> Mange All Brands</h4>
    <p class="mg-b-0"> Do bigger this side i like it </p>
</div>
</div>
<div class="card shadow-base bd-0 pd-25 mg-t-20">
<div class="d-md-flux justify-content-between align-items-center" >
<div>
<h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Manage All Brand</h6>
</div>
</div>

<div class="bd rounded table-responsive">
    <table class="table table-bordered table-striped table-hover" cellspacing="0" width="100%">
<thead>
<tr>
<th>#SI</th>
<th>Image</th>
<th>Name</th>
<th>Slug</th>
<th>Description</th>
<th>Is Featured</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>

@php $i=1; @endphp
@foreach($brands as $brand)


<tr>
<th scope="row">{{$i}}</th>
<td>
  @if(!is_null($brand->image))
  <img src="{{asset('backend/img/brand')}}/{{$brand->image}}" width="40">
  @else
  No Thumbnail
  @endif
</td>
<td>{{$brand->name}}</td>
<td>{{$brand->slug}}</td>
<td>{{$brand->description}}</td>
<td>
@if($brand->is_featured==1)
<span class="badge badge-success">Yes</span>
@else
<span class="badge badge-warning">No</span>
@endif
</td>
<td>
@if($brand->status==1)
<span class="badge badge-success">Active</span>
@else
<span class="badge badge-warning">Inactive</span>
@endif
</td>
<td>
<a class="btn btn-info btn-sm" href="{{route('brand.edit',$brand->id)}}">
<i class="fas fa-pencil-alt"></i>
</a>
<a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#deleteBrand{{$brand->id}}">
<i class="fas fa-trash"></i>
</a>

<div class="modal fade" id="deleteBrand{{$brand->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<li><a href="{{route('brand.destroy', $brand->id)}}" class="btn btn-danger">Delete</a></li>
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
