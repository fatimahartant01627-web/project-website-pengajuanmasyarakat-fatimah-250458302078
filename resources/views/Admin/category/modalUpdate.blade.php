<div class="modal fade" id="edit{{ $fatimah->id }}">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-header">
        <h4 class="modal-title">Update Data User</h4>
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <form action="{{ route('update.category', $fatimah->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="modal-body">
          
          
          <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="hidden" name="id" value="{{ $fatimah->id }}">
            <input type="text" name="category" value="{{ $fatimah->category }}" class="form-control">
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>

      </form>

    </div>
  </div>
</div>
