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
                                    <span input-group-text>ImagePath and Title</span>
                            </div>
                            <input type="file" class="form-control" name="imagePath">
                            <input  type="text" class="form-control" name="title">
                    </div>
                    <div class="input-group">
                            <div class="input-group-prepend">
                                    <span input-group-text>Description and Price</span>
                            </div>
                            <input type="text" class="form-control" name="description">
                            <input  type="text" class="form-control" name="price">
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
