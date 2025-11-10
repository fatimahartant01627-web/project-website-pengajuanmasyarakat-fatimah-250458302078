<div class="modal fade" id="edit{{ $f->id }}">
    <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">update data User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                {{-- harus ada input hidden untuk mengupdate --}}
                <input type="hidden" name="id" value="{{ $f->id }}">
                <div class="form-group">
                  <label class="form-label">Nama Lengkap</label>
                  <input type="text" name="name" value="{{ $f->name}}" class="form-control" placeholder=". . .">
                </div>
                <div class="form-group">
                  <label class="form-label">Email</label>
                  <input type="email" value="{{ $f->email }}" name="email" class="form-control" placeholder=". . .">
                </div>
                <div class="form-group">
                  <label class="form-label">No telepon</label>
                  <input type="number" value="{{ $f->phone }}" name="phone" class="form-control" placeholder=". . .">
                </div>
                <div class="form-group">
                  <label class="form-label">nik</label>
                  <input type="number" value="{{ $f->nik}}" name="nik" class="form-control" placeholder=". . .">
                </div>
                <div class="form-group">
                  <label class="form-label">foto profile</label>
                  <input type="file" name="image" class="form-control" placeholder=". . .">
                  @if($f->image)
                  <small class="form-text text-muted">Current:</small>
                  <img src="{{ asset('storage/public/usersImages/'. $f->image) }}"
                  style="max-width:120px; height:auto; margin-top:6px;" alt="current profile">
                  @endif
                </div>

                <div class="form-group">
                  <label class="form-label">Alamat Lengkap</label>
                  <input type="text" value="{{ $f->address }}" name="address" class="form-control" placeholder=". . .">
                </div>
                <div class="form-group">
                  <label class="form-label">gender</label><br>
                  <input type="radio" name="gender" value="male" {{ $f->gender == 'male' ? 'checked' : '' }} required > Laki-laki
                  <input type="radio" name="gender" value="female" {{ $f->gender == 'female' ? 'checked' : '' }} > Wanita
                </div>
                <div class="form-group">
                  <label class="form-label">role</label>
                  <select name="role" class="form-control" required>
                  <option value="admin"{{ $f->role }}>admin</option>
                  <option value="user"{{ $f->role }}>User</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="form-label">password</label>
                  <input type="text" value="{{ $f->password }}" name="password" class="form-control" placeholder=". . .">
                </div>
           
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save Data</button>
            </div>
          </div>
           </form>

          <!-- /.modal-content -->
      </div>
        <!-- /.modal-dialog -->
  </div>
</div>
</div>