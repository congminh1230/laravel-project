@extends('backend.layouts.master')
@section('content-header')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tạo mới users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Danh sách bài viết</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content')
<div class="col-12">
          <form>
              <div class="input-group" style="width: 100%; margin-bottom:10px ">
                  <input type="text" name="title" class="form-control float-right" placeholder="Title">
                  <input type="text" name="status" class="form-control float-right" placeholder="Status">
                  <button type="submit" class="btn btn-default">
                    Filter
                  </button>
              </div>
          </form>
        </div>
<table class="table table-striped projects">
    <a href="{{route('backend.posts.create')}}" class="btn badge-success" > Tạo bài viết </a>
              <thead>
                  <tr>
                      <th>
                         ID
                      </th>
                      <th>
                        Tên Bài Viết
                      </th>
                      <th >
                         Danh Mục
                      </th>
                      <th >
                         Nội Dung
                      </th>
                      <th>
                          Người tạo
                      </th>
                      <th >
                          Ngày tạo
                      </th>
                      <th >
                            Hành Động
                      </th>
                  </tr>
              </thead>
              <tbody>
              @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }} <a href="">show</a></td>
                        <td>{{ $post->category_id }}</td>
                        <!-- <td>{{ $post->slug }}</td> -->
                        <!-- <td>{{ $post->image_url }}</td> -->
                        <td>{{ $post->content }}</td>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="{{ route('backend.posts.edit', ['post' => $post->id ]) }}" class="btn bg-primary"><i class="far fa-edit"></i></a>
                            <form  method="POST" action="{{ route('backend.posts.destroy', ['post' => $post->id ]) }}" >
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                  </button>
                            </form>
                        </td>

                        <!-- <td>{{ $post->user_created_id }}</td>
                        <td>{{ $post->user_updated_id }}</td>
                        <td>{{ $post->status }}</td> -->
                    </tr>
                 @endforeach
              </tbody>
          </table>
@endsection