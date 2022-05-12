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
                      <th>Người tạo</th>
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
                        <img src="{{ Illuminate\Support\Facades\Storage::disk($image->disk)->url($image->path)}}"
                            width="100px">
                        </td>
                        <td></td>
                        <td></td>
                    </tr>
                 @endforeach
                  </tbody>
                </table>
              </div>

    </div>
@endsection