@extends('layout.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Halaman Edit Data</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Data User</a></li>
              <li class="breadcrumb-item active">Tambah User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <form action="{{route('admin.userupdate',['id'=>$data->id])}}"method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                      <!-- general form elements -->
                      <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Masukkan Data Baru</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form>
                          <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputname">Nama</label>
                                <input type="text" name="name" class="form-control" id="exampleInputname" value="{{$data->name}}"placeholder="Masukkan Nama">
                                @error('name')
                                    <small>{{$message}}</small>
                                @enderror
                              </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Email address</label>
                              <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="{{$data->email}}" placeholder="Masukkan Email">
                              @error('nama')
                              <small>{{$message}}</small>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Password</label>
                              <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                              @error('nama')
                              <small>{{$message}}</small>
                              @enderror
                            </div>
                           
                            
                          <!-- /.card-body -->
          
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </form>
                      </div>
                
            </form>
      </section>


@endsection