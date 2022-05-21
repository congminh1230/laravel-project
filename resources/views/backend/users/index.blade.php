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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Danh sách Users</li>
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
          <form style="margin: 20px 0 ; display:flex; justify-content:space-evenly " method="GET" action="{{ route('backend.users.index')}}" class="form-inline"  >
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
        <a href="{{route('backend.users.create')}}" class="btn badge-success" > Tạo bài viết </a>
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Avatar</th>
                      <th>Email</th>
                      <th>Status</th>
                      <th>Action </th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }} <a href="{{ route('backend.users.show', ['user' => $user->id ]) }}">show</a></td>
                        <td>
                          @if(!empty($user->avatar))
                            <img src="{{ Illuminate\Support\Facades\Storage::disk($user->disk)->url($user->avatar)}}"
                            width="100px">
                          @endif
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->status }}</td>
                        <td style="display: flex;gap: 10px;" >
                            <a href="{{ route('backend.users.edit', ['user' => $user->id ]) }}" class="btn bg-primary"><i class="far fa-edit"></i></a>
                            <form  method="POST" action="{{ route('backend.users.destroy', ['user' => $user->id]) }}" >
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
                {{ $users->links() }}
              </div>

    </div>
@endsection
@section('script')
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}
@endsection
