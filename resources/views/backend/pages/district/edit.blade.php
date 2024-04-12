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





<form class="shadow p-3 mb-5 bg-body rounded bg-white mt-4" action="{{route('district.update',$district->id)}}" method="POST" enctype="multipart/form-data">
    @csrf


<div class="form-group">
<label>District Name</label>
<input type="text" name="name" class="form-control" required="required" value="{{$district->name}}">
</div>

<div class="form-group">
<label>Division Name</label>
<select name="division_id" class="form-control">
<option>Please Select the Division Name</option>

@foreach (App\Models\Backend\Division::orderBy('name','asc')->get() as $division)
                    <option value="{{$division->id}}"@if ($district->division_id ==$division->id)selected  @endif>{{$division->name}}</option>
                @endforeach

            </select>
</div>





<div class="form-group">
<input type="submit" name="addUser" class="btn btn-block btn-primary btn-flat" value="Save Change">
</div>

</div>
</form>

@endsection
