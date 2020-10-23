@extends('layouts.admin')
@section('content')
<center>
<h1>Lists of Menu</h1>
<table class="table table-bordered">
<tr>

<th>ID</th>
<th>Name</th>
<th>LINK</th>
<th>STATUS</th>
<th>CREATED_AT</th>
<th>UPDATE_AT</th>
<th colspan="2">ACTION</th>
</tr>
@foreach($menus as $key=>$menu)

<tr>
<td >{{$menu->id}}</td>
<td>{{$menu->name}}</td>
<td>{{$menu->link}}</td>
<td>{{$menu->status}}</td>
<td>{{$menu->created_at}}</td>
<td>{{$menu->updated_at}}</td>
<td><a  type="button" class="btn btn-info btn-md"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
<td><a  type="button" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
</tr>
@endforeach
</table>
<div style="margin-left:500px">

{{$menus->links()}}
</div>


@endsection
