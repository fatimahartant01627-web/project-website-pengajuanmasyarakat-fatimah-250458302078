<div class="modal fade" id="delete{{ $f->id }}">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah data user</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.delete') }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" value="{{ $f->id }}">
                <p>Apakah anda yakin ingin menghapus data {{ $f->category }} ?</p>
            </div>
           
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-danger">Delete</button>
            </div>
            </div>
           </form>

        </div>
</div>