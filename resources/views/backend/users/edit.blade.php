@extends('backend.layouts.master')
@section('content-header')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Chỉnh sửa users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Chỉnh sửa users</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content')
<div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        <div class="card card-primary col-12">
              <!-- <div class="card-header">
                <h3 class="card-title">Nhập thông tin</h3>
              </div> -->
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="{{route('backend.users.update',['user' => $users->id ])}}" enctype="multipart/form-data" >
                @csrf
                @method('PUT')
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="name" name="name" class="form-control" value="{{ $users->name }}" id="exampleInputEmail1" placeholder="Enter name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Tải lên ảnh</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="avatar">
                            <label class="custom-file-label" for="exampleInputFile">Chọn file</label>
                        </div>
                        <div class="input-group-append">
                        <span class="input-group-text">Tải lên</span>
                    </div>
                </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">phone</label>
                    <input type="phone" name="phone" class="form-control" id="exampleInputEmail1" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group mb-0">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                      <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of service</a>.</label>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
        </div>
        
      </div><!-- /.container-fluid -->
@endsection