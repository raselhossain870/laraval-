@extends('backend.layout.template')
@section('body')

<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
<div>
    <h4> Mange All Catagories</h4>
    <p class="mg-b-0"> Do bigger this side i like it </p>
</div>
</div>
<div class="card shadow-base bd-0 pd-25 mg-t-20">
<div class="d-md-flux justify-content-between align-items-center" >
<div>
<h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Manage All Catagories </h6>
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
<th>Category/Subcategory</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>

@php $i=1;
@endphp
@foreach($catagories as $category)
@if($category->is_parent ==0)

<tr>
<th scope="row">{{$i}}</th>
<td>
  @if(!is_null($category->image))
  <img src="{{asset('backend/img/category')}}/{{$category->image}}" width="40">
  @else
  No Thumbnail
  @endif
</td>
<td>{{$category->name}}</td>
<td>{{$category->slug}}</td>
<td>{{$category->description}}</td>
<td>
@if($category->is_parent ==0)
<span class="badge badge-success">Primary Category</span>
@else
<span class="badge badge-warning">{{$category->parent->name}}</span>
@endif
</td>

<td>
@if($category->status==1)
<span class="badge badge-success">Active</span>
@else
<span class="badge badge-warning">Inactive</span>
@endif
</td>

<td>
<a class="btn btn-info btn-sm" href="{{route('category.edit',$category->id)}}">
<i class="fas fa-pencil-alt"></i>
</a>

<a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#deletecatagory{{$category->id}}">
<i class="fas fa-trash"></i>
</a>

<div class="modal fade" id="deletecatagory{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<li><a href="{{route('category.destroy', $category->id)}}" class="btn btn-danger">Delete</a></li>
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


@foreach(App\Models\Backend\Category::orderBy('name','asc')->where('is_parent',$category->id)->get() as $subcat)
@php $j=$i+1;
@endphp

<tr>
<th scope="row">{{$j}}</th>
<td>
@if(!is_null($subcat->image))
<img src="{{asset('Backend/img/category')}}/{{$subcat->image}}" width="40">
@else
No Thumbnail
@endif
</td>
<td>{{$subcat->name}}</td>
<td>{{$subcat->slug}}</td>
<td>{{$subcat->description}}</td>
<td>
<span class="badge badge-warning">{{$subcat->parent->name}}</span>
</td>
<td>
@if($subcat->status==1)
<span class="badge badge-success">Active</span>
@else
<span class="badge badge-warning">Inactive</span>
@endif
</td>

<td>
<a class="btn btn-info btn-sm" href="{{route('category.edit',$subcat->id)}}">
<i class="fas fa-pencil-alt"></i>
</a>
<a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#deletecatagory{{$subcat->id}}">
<i class="fas fa-trash"></i>
</a>

<div class="modal fade" id="deletecatagory{{$subcat->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">


<h5 class="modal-title" id="exampleModalLabel"> Delete this subcategory information </h5>
<button type="button" class="close" data-dismiss="modal" aria-label="close">
<span aria-hidden="true">&times;</span>
</button>
</div>

<div class="modal-body">
<ul>
<li><a href="{{route('category.destroy', $subcat->id)}}" class="btn btn-danger">Delete</a></li>
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
@php $i++;
@endphp
@endforeach
@php $i++;
@endphp
@endif
@endforeach

</tbody>
</table>


</div>


@endsection
