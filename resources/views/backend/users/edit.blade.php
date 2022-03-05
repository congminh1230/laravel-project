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
              @include('backend.users.components.user_from',[
                  'user_route' => route('backend.users.update',['user' => '1']),
                  'method' => 'put'
              ])
            </div>
        </div>
        
      </div><!-- /.container-fluid -->
@endsection