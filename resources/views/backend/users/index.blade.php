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
        <a href="{{route('backend.users.create')}}" class="btn badge-success" > Tạo bài viết </a>
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Avatar</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Status</th>
                      <th>Action </th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }} <a href="{{ route('backend.users.show', ['user' => $user->id ]) }}">show</a></td>
                        <td>{{ $user->avatar }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->status }}</td>
                        <td>
                            <a href="{{ route('backend.users.edit', ['user' => $user->id ]) }}" class="btn bg-primary"><i class="far fa-edit"></i></a>
                            <form  method="POST" action="{{ route('backend.users.destroy', ['user' => $user->id ]) }}" >
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
