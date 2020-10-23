@extends('layouts.admin')
@section('content')

<h1 class="text-center">List of Items</h1>
<a data-toggle="modal" data-target="#exampleModal-create" type="button" class="btn btn-info">New Item</a>
@extends('items.add_item')
<table class="table table-bordered">
<tr>
<th>ID</th>
<th>IMAGE LINK</th>
<th>TITLE</th>
<th>DESCRIPTION</th>
<th>PRICE</th>
<th>CREATED_AT</th>
<th>UPDATE_AT</th>
<th colspan="2">ACTION</th>
@foreach($products as $key=> $product)

<tr>
<td >{{$product->id}}</td>
<td>{{$product->imagePath}}</td>
<td>{{$product->title}}</td>
<td>{{$product->description}}</td>
<td>{{$product->price}}</td>
<td>{{$product->created_at}}</td>
<td>{{$product->updated_at}}</td>

<td><a data-product_id="{{$product->id}}" data-imagePath="{{$product->imagePath}}" data-title="{{$product->title}}" data-description="{{$product->description}}" data-price="{{$product->price}}"    data-toggle="modal" data-target="#exampleModal-edit" type="button" class="btn btn-info btn-md"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
<td><a  data-product_id="{{$product->id}}" data-toggle="modal" data-target="#exampleModal-delete" type="button" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
</tr>
@endforeach
</table>
<div style="margin-left:500px">
{{$products->links()}}
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
                        <input type="hidden" id="product_id" name="product_id">
                    <div class="input-group">
                            <div class="input-group-prepend">
                                    <span input-group-text>ImagePath and Description</span>
                            </div>
                            <input type="file" class="form-control" name="imagePath">
                            <input  type="text" class="form-control" name="description">
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
                <form action="{{route('items.update','product_id')}}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" id="product_id" name="product_id">
                    <div class="input-group">
                            <div class="input-group-prepend">
                                    <span input-group-text>ImagePath and Title</span>
                            </div>
                            <input type="file" class="form-control" id="imagePath" name="imagePath">
                            <input  type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="input-group">
                            <div class="input-group-prepend">
                                    <span input-group-text>Description and Price</span>
                            </div>
                            <input type="text" class="form-control" id="description" name="description">
                            <input  type="text" class="form-control" id="price" name="price">
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
        <form action="{{route('items.destroy','product->id')}}" method="post">
        @csrf
        @method('DELETE')
        <input type="hidden" id="product_id" name="product_id">
          <p class="text-center" width="50px">Are you sure you want to Delete this Item?</p>
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
        var imagePath    = button.data('imagePath')
        var title    = button.data('title')
        var description  = button.data('description')
        var price    = button.data('price')
        var product_id = button.data('product_id')

        var modal = $(this)

        modal.find('.modal-title').text('EDIT ITEM');
        modal.find('.modal-body #imagePath').val(imagePath);
        modal.find('.modal-body #title').val(title);
        modal.find('.modal-body #description').val(description);
        modal.find('.modal-body #price').val(price);
        modal.find('.modal-body #product_id').val(product_id);

})

$('#exampleModal-delete').on('show.bs.modal', function(event){
        var button= $(event.relatedTarget)
        var product_id = button.data('product_id')
        var modal = $(this)

        modal.find('.modal-title').text('DELETE ITEM')
        modal.find('.modal-body #product_id').val(product_id)
    })
</script>
@endsection