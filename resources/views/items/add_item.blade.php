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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" > Save Item</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
