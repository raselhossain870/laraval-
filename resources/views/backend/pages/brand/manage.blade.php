@extends('backend.layout.template')
@section('body')

<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
<div>
    <h4> Mange All Catagories</h4>
    <p class="mg-b-0"> Do bigger </p>
</div>
</div>
<div class="card shadow-base bd-0 pd-25 mg-t-20">
<div class="d-md-flux justify-content-between align-items-center" >
<div>
<h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Manage All category</h6>
</div>
</div>

<div class="bd rounded table-responsive">
    <table class="table table-bordered table-striped table-hover"cellspacing="0" width="100">
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

<tr>
<th scope="row">01</th>
<td>Rasel er chobi</td>
<td>Rasel</td>
<td>brand</td>
<td>brand category</td>
<td>Yellow/Arong</td>
<td>Active</td>
<td>edit/delete</td>
</tr>
</tbody>
</table>


</div>


@endsection
