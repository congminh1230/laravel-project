@section('link')
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
@endsection
@extends('backend.layouts.master')
@section('content-header')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Danh sách users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Images</a></li>
              <li class="breadcrumb-item active">Danh sách Images</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content')
    <div class="row">
      <div class="card-body table-responsive p-0">
        <div class="col-12">
          <form>
              <div class="input-group" style="width: 100%; margin-bottom:10px ">
                  <input type="text" name="name" class="form-control float-right" placeholder="Name">
                  <input type="text" name="email" class="form-control float-right" placeholder="Email">
                  <button type="submit" class="btn btn-default">
                    Filter
                  </button>
              </div>
          </form>
        </div>
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Avatar</th>
                      <th>Chức Năng</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($images as $image)
                    <tr>
                        <td>{{ $image->id }}</td>
                        <td>
                           {{$image->product_id}}
                        </td>
                        <td>
                        <img src="{{$image->path }}"
                            width="100px">
                        </td>
                        <td style="display: flex" >
                            <a style="margin-right:10px;" href="{{ route('backend.images.edit',['image' => $image->id ]) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                            <form method="POST" action="{{ route('backend.images.destroy',['image' => $image->id ]) }}">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                              </button>
                            </form>
                        </td>
                    </tr>
                 @endforeach
                  </tbody>
                </table>
              </div>

    </div>
@endsection
@section('script')
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}
@endsection