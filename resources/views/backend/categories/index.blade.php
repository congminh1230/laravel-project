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
<table class="table table-striped projects">
    <a href="{{route('backend.categories.create')}}" class="btn badge-success" > Tạo danh mục </a>
              <thead>
                  <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Thumbnail</th>
                        <th>Description</th>
                        <th>Parent</th>
                        <th>Created_at</th>
                        <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                 @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>{{ $category->updated_at }}</td>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="#" class="btn bg-primary"><i class="far fa-edit"></i></a>
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
@endsection