<div class="modal fade left" id="exampleModal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-lg modal-right modal-info" role="document">
    <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
       </div>
    <div class="modal-body">
      <form action="{{route('categories.update','category_id')}}" method="POST">
        @csrf
        @method('PUT')
        <div class="input-group">
           <div class="input-group-prepend">
           <span class="input-group-text">Category_id</span>
           </div>
           
           <input type="text" class="form-control" id="category_id" name="category_id"> 
           </div>
        <div class="input-group">
           <div class="input-group-prepend">
             <span class="input-group-text">Name and Slug</span>
           </div>
            <input  type="text" class="form-control" id="name" name="name" placeholder="name">
            <input  type="text" class="form-control" id="slug" name="slug" placeholder="slug"> 
        </div>
           
        <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-info">Update Item</button>
        </div> 
      </form>
    </div>
    </div>
  </div>
</div>