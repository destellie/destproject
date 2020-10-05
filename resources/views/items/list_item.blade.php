@extends('layouts.admin')
@section('content')

<h1 class="text-center">List of Items</h1>
<a data-toggle="modal" data-target="#exampleModal-create" type="button" class="btn btn-info">New Item</a>
@extends('items.add_item')
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
<th colspan="2">ACTION</th>
@foreach($items as $key=> $item)

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

<td><a data-item_id="{{$item->id}}" data-name="{{$item->name}}" data-slug="{{$item->slug}}" data-content="{{$item->content}}" data-price="{{$item->price}}" data-published="{{$item->published}}" data-user_id="{{$item->user_id}}" data-category_id="{{$item->category_id}}" data-toggle="modal" data-target="#exampleModal-edit" type="button" class="btn btn-info btn-md">Edit</a></td>
<td><a  data-item_id="{{$item->id}}" data-toggle="modal" data-target="#exampleModal-delete" type="button" class="btn btn-danger">Delete</a></td>
</tr>
@endforeach
</table>
<div style="margin-left:500px">
{{++$key}}
{{$items->links()}}
</div>


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
                <form action="{{route('items.store')}}" method="post">
                        @csrf
                        <input type="hidden" id="item_id" name="item_id">
                    <div class="input-group">
                            <div class="input-group-prepend">
                                    <span input-group-text>Name and Slug</span>
                            </div>
                            <input type="text" class="form-control" name="name">
                            <input  type="text" class="form-control" name="slug">
                    </div>
                    <div class="input-group">
                            <div class="input-group-prepend">
                                    <span input-group-text>Content and Price</span>
                            </div>
                            <input type="text" class="form-control" name="content">
                            <input  type="text" class="form-control" name="price">
                    </div>
                    <div class="input-group">
                            <div class="input-group-prepend">
                                    <span input-group-text>Published and User_id</span>
                            </div>
                            <input type="text" class="form-control" name="published">
                            <input  type="text" class="form-control" name="user_id">
                    </div>
                    <div class="input-group">
                            <div class="input-group-prepend">
                                    <span input-group-text>Category_id</span>
                            </div>
                            <input  type="text" class="form-control" name="category_id">
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

<div class="modal fade left" id="exampleModal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-lg modal-right modal-info" role="document">
    <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
       </div>
        <div class="modal-body">
                <form action="{{route('items.update','item_id')}}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" id="item_id" name="item_id">
                    <div class="input-group">
                            <div class="input-group-prepend">
                                    <span input-group-text>Name and Slug</span>
                            </div>
                            <input type="text" class="form-control" id="name" name="name">
                            <input  type="text" class="form-control" id="slug" name="slug">
                    </div>
                    <div class="input-group">
                            <div class="input-group-prepend">
                                    <span input-group-text>Content and Price</span>
                            </div>
                            <input type="text" class="form-control" id="content" name="content">
                            <input  type="text" class="form-control" id="price" name="price">
                    </div>
                    <div class="input-group">
                            <div class="input-group-prepend">
                                    <span input-group-text>Published and User_id</span>
                            </div>
                            <input type="text" class="form-control" id="published" name="published">
                            <input  type="text" class="form-control" id="user_id" name="user_id">
                    </div>
                    <div class="input-group">
                            <div class="input-group-prepend">
                                    <span input-group-text>Category_id</span>
                            </div>
                            <input  type="text" class="form-control" id="category_id" name="category_id">
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
        <form action="{{route('items.destroy','item->id')}}" method="post">
        @csrf
        @method('DELETE')
        <input type="hidden" id="item_id" name="item_id">
          <p class="text-cent" width="50px">Are you sure you want to Delete this Item?</p>
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
<script>
$('#exampleModal-edit').on('show.bs.modal', function(event){
        var button   = $(event.relatedTarget)
        var name     = button.data('name')
        var slug     = button.data('slug')
        var content  = button.data('content')
        var price    = button.data('price')
        var published = button.data('published')
        var user_id  =   button.data('user_id')
        var category_id = button.data('category_id')
        var item_id = button.data('item_id')

        var modal = $(this)

        modal.find('.modal-title').text('EDIT ITEM');
        modal.find('.modal-body #name').val(name);
        modal.find('.modal-body #slug').val(slug);
        modal.find('.modal-body #content').val(content);
        modal.find('.modal-body #price').val(price);
        modal.find('.modal-body #published').val(published);
        modal.find('.modal-body #user_id').val(user_id);
        modal.find('.modal-body #category_id').val(category_id);
        modal.find('.modal-body #item_id').val(item_id);

})

$('#exampleModal-delete').on('show.bs.modal', function(event){
        var button= $(event.relatedTarget)
        var item_id = button.data('item_id')
        var modal = $(this)

        modal.find('.modal-title').text('DELETE ITEM')
        modal.find('.modal-body #item_id').val(item_id)
    })
</script>
@endsection