@extends('backend.layout.template')
@section('body')

<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
<div>
    <h4> Mange All Districts</h4>
    <p class="mg-b-0"> Do bigger this side i like it </p>
</div>
</div>
<div class="card shadow-base bd-0 pd-25 mg-t-20">
<div class="d-md-flux justify-content-between align-items-center" >
<div>
<h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Manage All District</h6>
</div>
</div>

<div class="pd-1-25 pd-b-25">
<div class="bd rounded table-responsive">
    <table class="table table-bordered table-striped table-hover" cellspacing="0" width="100%">
<thead>
<tr>
<th scope="col">#SI.</th>
<th scope="col">District Name</th>
<th scope="col">Division Name</th>
<th scope="col">Action</th>
</tr>
</thead>
<tbody>



@php $i = 1; @endphp
@foreach ( $districts as $district)

<tr>
<td>{{$i}}</td>
<td>{{$district->name}}</td>
<td>{{$district->division->name}}</td>

<td>
<a class="btn btn-info btn-sm" href="{{route('district.edit',$district->id)}}">
<i class="fas fa-pencil-alt"></i>
</a>

<a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#deletedivision{{$district->id}}">
<i class="fas fa-trash"></i>
</a>

<div class="modal fade" id="deletedivision{{$district->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<li><a href="{{route('district.destroy', $district->id)}}" class="btn btn-danger">Delete</a></li>
<li><button type="button" class="btn btn-primary" data-dismiss="modal">Cancel
</button>
</li>
</ul>
</div>
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
</div>
</div>
</div>
</div>
@endsection
