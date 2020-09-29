<div class="modal fade right" id="exampleModal-create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog model-notify modal-lg modal-right modal-success" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
       <div class="modal-body">
          <form action="{{route('categories.store')}}" method="POST">
                @csrf
              @method('POST')
            <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">Name and Slug</span>
                </div>
                  <input type="text" class="form-control" id="name" name="name">
                  <input  type="text" class="form-control" id="slug" name="slug">
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
</script>