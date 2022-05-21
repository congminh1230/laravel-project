@section('link')
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
@endsection
@extends('backend.layouts.master')
@section('content-header')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Danh sách Logos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Logos</a></li>
              <li class="breadcrumb-item active">Danh sách Logos</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content')
<div class="col-12">
          <form style="margin: 20px 0 ; display:flex; justify-content:space-evenly " method="GET" action="{{ route('backend.logo.index')}}" class="form-inline"  >
            <div class="col-3">
              <input value="{{ request()->get('name')}}" name="name" type="text" class="form-control" placeholder="Nhập tên cần tìm..">
            </div>
            <div style="margin-right: 30px">
                <button type="submit" class="btn btn-info">Lọc</button>
              </div>
            {{-- <div >
                <a href="{{ route('backend.posts.index')}}" class="btn btn-default"> Quay lại</a>
            </div> --}}
          </form>
        </div>
    <div class="row">
      <div class="card-body table-responsive p-0">
        <a href="{{ route('backend.logo.create') }}" style="margin-bottom: 10px;" class="btn btn-success"><i style="margin-bottom:10px" class="fas fa-plus"></i>Tạo Logo</a>
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Tên Logos</th>
                      <th>Logos</th>
                      <th>Chức Năng</th>
                    </tr>
                  </thead>
                  <tbody>
                   @if(!empty($logos))
                  @foreach($logos as $logo)
                    <tr>
                        <td>{{ $logo->id }}</td>
                        <td>
                           {{$logo->name}}
                        </td>
                        <td>
                        <img src="{{ Illuminate\Support\Facades\Storage::disk($logo->disk)->url($logo->path)}}"
                            width="100px">
                        </td>
                        <td style="display: flex" >
                            <a style="margin-right:10px;" href="{{ route('backend.logo.edit',['logo' => $logo->id ]) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                            <form method="POST" action="{{ route('backend.logo.destroy',['logo' => $logo->id ]) }}">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                              </button>
                            </form>
                        </td>
                    </tr>
                 @endforeach
                 @endif
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