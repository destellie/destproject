@extends('layouts._admin')
@section('content')
<button class="btn btn-warning"><a class="nav-link" href="{{url('pages/add_item')}}">+</a></button>
<center>
<h1>Lists of Items</h1>
<table class="table table-bordered">
<tr>
<th>ID</th>
<th>Name</th>
<th>SLUG</th>
<th>CONTENT</th>
<th>PRICE</th>
<th>PUBLISHED</th>
<th>USER_ID</th>
<th>CATEGORY_ID</th>
<th>CREATED_AT</th>
<th>UPDATE_AT</th>
<th colspan="3">ACTION</th>
@foreach($items as $item)

<tr>
<td >{{$item->id}}</td>
<td>{{$item->name}}</td>
<td>{{$item->slug}}</td>
<td>{{$item->content}}</td>
<td>{{$item->price}}</td>
<td>{{$item->published}}</td>
<td>{{$item->user_id}}</td>
<td>{{$item->category_id}}</td>
<td>{{$item->created_at}}</td>
<td>{{$item->updated_at}}</td>
<td><button class="btn btn-warning"><a class="nav-link" href="{{url('pages/update_items',$item->id)}}">Update</a></button></td>
<td><button class="btn btn-info"><a class="nav-link" href="{{url('pages/update_items',$item->id)}}">Update</a></button></td>
<td><button class="btn btn-danger"><a class="nav-link" href="{{url('/list_item',$item->id)}}">Delete</a></button></td>
</tr>
@endforeach


</table>

</center>
@stop