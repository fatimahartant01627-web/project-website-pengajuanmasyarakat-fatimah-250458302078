@extends('template.base')

@section('fatimah')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Table Data User</h1>
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
                + Tambah User</a>
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
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                 {{ Session::get('delete') }}
                </div>
                @endif

                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                    <th>no</th>
                    <th>nama</th>
                    <th>no. telepon</th>
                    <th>email</th>
                    <th>image</th>
                    <th>aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $f)
                        <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $f->name }}</td>
                        <td>{{ $f->phone }}</td>
                        <td>{{ $f->email }}</td>
                        <td>
                          <img src="{{ asset('storage/public/userImages' . $f->image)}}" width="25%">
                        </td>
                        
                        <td>
                          <a href="" class="btn btn-secondary btn-sm" data-toggle="modal" data-target=""><i class="fas fa-solid fa-eye"></i></a>
                          
                          <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit{{ $f->id }}"><i class="fas fa-solid fa-edit"></i></a>
                           @include('Admin.dataUser.modalUpdate')

                          <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $f->id }}"><i class="fas fa-solid fa-trash"></i></a>
                          @include('Admin.dataUser.modalDelete')
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
                <h4 class="modal-title">Tambah data User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <form action="{{ route('user.create') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('POST')
                  <div class="form-group">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="name" class="form-control" placeholder=". . .">
                  </div>
                  <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder=". . .">
                  </div>
                  <div class="form-group">
                    <label class="form-label">No telepon</label>
                    <input type="number" name="phone" class="form-control" placeholder=". . .">
                  </div>
                  <div class="form-group">
                    <label class="form-label">nik</label>
                    <input type="number" name="nik" class="form-control" placeholder=". . .">
                  </div>
                  <div class="form-group">
                    <label class="form-label">foto profile</label>
                    <input type="file" name="image" class="form-control" placeholder=". . .">
                  </div>
                  <div class="form-group">
                    <label class="form-label">alamat</label>
                    <input type="text" name="address" class="form-control" placeholder=". . .">
                  </div>
                  <div class="form-group">
                    <label class="form-label">gender</label><br>
                    <input type="radio" name="gender" value="male"> Laki-laki
                    <input type="radio" name="gender" value="female"> Wanita
                  </div>
                  <div class="form-group">
                    <label class="form-label">role</label>
                    <select name="role" class="form-control">
                    <option>-- pilih role --</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label class="form-label">password</label>
                    <input type="text" name="password" class="form-control" placeholder=". . .">
                  </div>
            
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </form>
            </div>
            </div>
            <!-- /.modal-content -->
        </div>
          <!-- /.modal-dialog -->
    </div>

@endsection