@section('link')
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
@endsection
@extends('backend.layouts.master')
@section('content-header')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Danh sách Danh Mục</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Danh sách Danh Mục</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content')
<div class="col-12">
          <form style="margin: 20px 0 ; display:flex; justify-content:space-evenly " method="GET" action="{{ route('backend.categories.index')}}" class="form-inline"  >
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
<table class="table table-striped projects">
        @if (session('error'))
        <div class="alert alert-danger" role="alert">
        {{ session('error') }}
        </div>
        @endif
        @if (session('success'))
        <div class="alert alert-success" role="alert">
        {{ session('success') }}
        </div>
        @endif
    <a href="{{route('backend.categories.create')}}"  style="margin-bottom:10px" class="btn badge-success" > Tạo Danh Mục </a>
              <thead>
                  <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Danh Mục Cha</th>
                        <th>Thời Gian Tạo</th>
                        <th>Thời Gian Update</th>
                        <th>Chức Năng</th>
                  </tr>
              </thead>
              <tbody>
                 @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            {{ $category->category_parent }}
                        </td>
                        <td>{{ $category->created_at }}</td>
                        <td>{{ $category->updated_at }}</td>
                        <td style="display: flex;gap: 10px;" >
                            <a href="{{ route('backend.categories.edit', ['category' => $category->id ]) }}" class="btn badge-success"><i class="fas fa-upload"></i></a>
                            <form  method="POST" action="{{ route('backend.categories.destroy', ['category' => $category->id ]) }}" >
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
          {{ $categories->links() }}
@endsection
@section('script')
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}
@endsection
