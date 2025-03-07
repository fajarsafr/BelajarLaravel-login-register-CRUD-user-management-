@extends('layout.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Data User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
  
            <div class="col-12">
              @can('superadmin')
                <a href="{{route('admin.usercreate')}}" class="btn btn-primary mb-3"> Tambah Data</a>
              @endcan
                
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Data</h3>
  
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
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                      </tr>
            @foreach($data as $d)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$d->name}}</td>
              <td>{{$d->email}}</td>
                @can('superadmin')
                <td>
                <a href="{{route ('admin.useredit',['id'=>$d->id])}}" class="btn btn-primary"><i class="fas fa-pen"></i> Edit</a>
                <a data-toggle="modal" data-target="#modal-hapus{{$d->id}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i>Hapus</a>
                </td>
              @endcan

           

            </tr>
            <div class="modal fade" id="modal-hapus{{$d->id}}">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Konfirmasi Hapus</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>Apakah anda ingin menghapus data user <b>{{$d->name}}</b> &hellip;</p>
                  </div>
                  <div class="modal-footer justify-content-between">
                    <form action="{{route('admin.userdelete',['id'=>$d->id])}}" method ="POST">
                      @csrf
                      @method('DELETE')
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Hapus</button>
                    </form>
                   
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
      
            @endforeach
                    
  </div> 
@endsection