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
                  <tr>
                      <td>
                         1
                      </td>
                      <td>
                        sdsdsdsdsd
                      </td>
                      <td>
                          dsdsdsdsd
                      </td>
                      <td class="project_progress">
                         dsdsdsd
                      </td>
                      <td class="project-state">
                          sdsdsd
                      </td>
                      <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" href="#">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
                          <a class="btn btn-info btn-sm" href="#">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="#">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                      </td>
                  </tr>
                
               
               
                 
                 
                
                 
                  
              </tbody>
          </table>
@endsection