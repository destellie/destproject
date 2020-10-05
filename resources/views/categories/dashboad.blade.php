@extends('layouts.admin')
@section('content')

<div class="col-md-12">
<a data-toggle="modal" data-target="#exampleModal-create" type="button" class="btn btn-info">New Category</a>
</div>
 @extends('categories.create')
<center>
<h1>Lists of Categories</h1>
<table class="table table-bordered">
<tr>

<th>ID</th>
<th>Name</th>
<th>SLUG</th>
<th>CREATED_AT</th>
<th>UPDATE_AT</th>
<th colspan="3">ACTION</th>
</tr>
@foreach($categories as $key=>$category)

<tr>

<td >{{$category->id}}</td>
<td>{{$category->name}}</td>
<td>{{$category->slug}}</td>
<td>{{$category->created_at}}</td>
<td>{{$category->updated_at}}</td>

<td><a data-category_id="{{$category->id}}" data-name="{{$category->name}}" data-slug="{{$category->slug}}" data-toggle="modal" data-target="#exampleModal-edit" type="button" class="btn btn-info btn-md"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
<td><a  type="button" class="btn btn-warning nav-link" href="{{route('categories.show',$category->id)}}">Show</a></td>
<td><a  data-category_id="{{$category->id}}" data-toggle="modal" data-target="#exampleModal-delete" type="button" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
</tr>
@endforeach
</table>
<div style="margin-left:500px">

</div>

<!-- Add new category -->
<div class="modal fade right" id="exampleModal-create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog model-notify modal-lg modal-right modal-success" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body">
        <form action="{{route('categories.store')}}" method="post">
        @csrf
        <input type="hidden" id="category_id" name="category_id">
        <div class="input-group">
     <div class="input-group-prepend">
     <span input-group-text>Name and Slug</span>
      </div>
     <input type="text" class="form-control" name="name">
     <input  type="text" class="form-control" name="slug">
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" > Save Item</button>
      </div>
      </form>
    </div>
    </div>
  </div>
</div>
<!-- Edit Category modal -->

<div class="modal fade left" id="exampleModal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-lg modal-right modal-info" role="document">
    <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
       </div>
    <div class="modal-body">
      <form action="{{route('categories.update','category_id')}}" method="post">
        @csrf
        @method('PUT')
          
        <div class="input-group">
         <div class="input-group-prepend">
             <span input-group-text>Name and Slug</span>
          </div>
            <input  type="text" class="form-control" id="name" name="name">
            <input  type="text" class="form-control" id="slug" name="slug"> 
            
        </div>
        <input type="hidden" id="category_id" name="category_id"> 
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-info">Update Item</button>
          </div> 
      </form>
    </div>
    </div>
  </div>
</div>
<!-- delete Category modal -->
<div class="modal fade left" id="exampleModal-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-lg modal-right modal-info" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('categories.destroy','category->id')}}" method="post">
        @csrf
        @method('DELETE')
        <input type="hidden" id="category_id" name="category_id">
          <p class="text-cent" width="50px">Are you sure you want to Delete this Category?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">No/Cancel</button>
        <button type="submit" class="btn btn-danger">yes/Delete</button>
      </div> 
      </form>
    </div>
  </div>
</div>
</div>
</center>

<script>
$('#exampleModal-edit').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget)
        var name = button.data('name')
        var slug = button.data('slug')
        var category_id = button.data('category_id')
        var modal = $(this)

        modal.find('.modal-title').text('EDIT CATEGORY');
        modal.find('.modal-body #name').val(name);
        modal.find('.modal-body #slug').val(slug);
        modal.find('.modal-body #category_id').val(category_id);

})

 $('#exampleModal-delete').on('show.bs.modal', function(event){
        var button= $(event.relatedTarget)
        var category_id = button.data('category_id')
        var modal = $(this)

        modal.find('.modal-title').text('DELETE CATEGORY')
        modal.find('.modal-body #category_id').val(category_id)
    })



</script>
@endsection
