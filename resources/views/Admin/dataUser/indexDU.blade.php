@extends('template.base')

@section('fatimah')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Table Dta Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


  <section class="content">
    <div class="container-fluid">

                <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <a href=""  class="btn btn-primary"  data-toggle="modal" data-target="#modal-default">
                  
                + Tambah Category</a>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
              {{-- aller create --}}
                @if(Session::get('succsess'))
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                 {{ Session::get('succsess') }}
                </div>
                @endif

                {{-- aller create --}}
                @if(Session::get('delete'))
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                 {{ Session::get('delete') }}
                </div>
                @endif

                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Category</th>
                      <th>Slug</th>
                      <th>Action</th>
                      <th>Image</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($user as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->phone }}</td>
                        <td>{{ $row->email }}</td>
                        <td>
                            <img src="{{ asset('storage/public/usersImages/'. $row->image) }}" width="50%">
                        </td>
                        <td>
                            <a href="" class="btn btn-outline-primary"><i class="fa-solid fa-eye"></i></a>
                            <a href="" class="btn btn-outline-secondary"><i class="fa-solid fa-pencil"></i></a>
                            <a href="" class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>                
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
    </div>
  </section>

  {{-- modal create --}}
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah data category</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.create') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="form-controller" name="name" placeholder="Masukkan data category">
            </div>

            <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" name="form-controller" name="email" required placeholder="....">
            </div>

            <div class="form-group">
                    <label class="form-label">No.telp</label>
                    <input type="number" name="form-controller" name="phone" required placeholder="....">
            </div>
            <div class="form-group">
                    <label class="form-label">nik</label>
                    <input type="number" name="form-controller" name="nik" required placeholder="....">
            </div>
            <div class="form-group">
                    <label class="form-label">Foto Profile</label>
                    <input type="file" name="form-controller" name="image" required placeholder="....">
            </div>
            <div class="form-group">
                    <label class="form-label">Alamat Lengkap</label>
                    <input type="text" name="form-controller" name="address" required placeholder="....">
            </div>
            <div class="form-group">
                    <label class="form-label">Gender</label> <br>
                    <input type="radio" name="gender" value="male" required> Pria
                    <input type="radio" name="gender" value="female"> Wanita
            </div>
            <div class="form-group">
                    <label class="form-label">role</label> <br>
                    <select name="role" class="form-control" required>
                        <option>--- Pilih Role ---</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
            </div>
            <div class="form-group">
                    <label class="form-label">password</label> <br>
                    <input type="text" name="password" class="form-control">
            </div>
        

           
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
           </form>

          <!-- /.modal-content -->
      </div>
        <!-- /.modal-dialog -->
  </div>

@endsection