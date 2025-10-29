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
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                 {{ Session::get('delete') }}
                </div>
                @endif

                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Lengkap</th>
                      <th>No.telp</th>
                      <th>Email</th>                     
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($User as $fatimah)
                        <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $fatimah->user }}</td>
                        <td>{{ $fatimah->slug }}</td>
                        <td>
                          <a href="" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#edit{{ $fatimah->id }}"><i class="fas fa-solid fa-edit"></i></a>
                          @include('Admin.User.modalUpdate')
                          <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $fatimah->id }}"><i class="fas fa-solid fa-trash"></i></a>
                          @include('Admin.User.modalDelete')
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
                <form action="{{ route('create.User') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" name="User" class="form-control" placeholder="Masukkan data User">
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