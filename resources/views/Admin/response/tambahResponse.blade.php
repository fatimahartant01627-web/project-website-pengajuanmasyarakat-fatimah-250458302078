@extends('template.base')

@section('fatimah')
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Respons</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Respon Complains</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('create.response') }}" method="post" enctype="multipart/form-data">
                 @csrf
                <div class="card-body">
                 <input type="hidden" name="complain_id" value="{{ $complain_id }}">
                 <div class="form-group">
                    <label for="">Judul Aduan</label>
                    <input type="text" class="form-control" value="{{ $komplen->judul ?? '' }}" readonly name="" id="">
                 </div>
                 <div class="form-group">
                    <label>Isi Aduan</label>
                    <textarea name="" class="form-control" rows="3" readonly>{{ $komplen->keterangan }}</textarea>
                 </div>

                  <div class="form-group">
                    <label>Response Aduan</label>
                    <textarea name="response" class="form-control" rows="6" required></textarea>
                    <p><small>Pokonya orang ngadu, dibales!</small></p>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
        </div>
    </section>

@endsection