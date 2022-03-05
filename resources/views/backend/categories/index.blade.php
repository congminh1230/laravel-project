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
    <a href="{{route('backend.posts.create')}}" class="btn badge-success" > Tạo danh mục </a>
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
                  <tr>
                      <td>
                         1
                      </td>
                      <td>
                         dsd
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
                          <a class="" href="#">
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