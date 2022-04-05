@extends('backend.layouts.master')
@section('content-header')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1 class="m-0">Tạo mới users</h1> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Danh sách images</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content')
<table class="table table-striped projects">
              <thead>
                      <th>Ảnh</th>
                      <th>Người tạo</th>
                      <th>Trạng thái</th>
                      <th>Thời gian tạo</th>
                      <th>Ngày cập nhật</th>
                      <th class="text-center">Hoạt động</th>
              </thead>
              <tbody>
                  @foreach($files as $file) {
                     <tr>
                        <td>
                              <img src="{{ Illuminate\Support\Facades\Storage::url($file)}}"
                              width="100px">
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                        <form method="POST" action="{{ route('backend.Storage.destroy') }}">
                              @csrf
                              <input type="hidden" name="file" value="{{ $file }}">
                              <button class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                              </button>
                        </form>
                        </td>
                     </tr>
                  }
                  @endforeach
              </tbody>
          </table>
@endsection