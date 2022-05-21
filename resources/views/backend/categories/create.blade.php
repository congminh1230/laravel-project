@extends('backend.layouts.master')
@section('content-header')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tạo Mới Danh Mục</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tạo Mới Danh Mục</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content')
<div class="container-fluid">
        <div class="row">
        <div class="card card-primary col-12">
              <!-- /.card-header -->
              <!-- form start -->
              <form class="" method="POST" action="{{route('backend.categories.store')}}">
                @csrf
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tiêu đề</label>
                    <input type="text" name="name" class="form-control" class="@error('name') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter...">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class= "row">
                    <div class="form-group col-6">
                    <div class="form-group">
                <label for="">Danh mục</label>
                <select class="form-control" name="category_parent">
                    <option value="0">
                        Chọn danh mục
                    </option>
                    @foreach ($categories as $category)
                        <option >{{ $category->name }}</option>
                    @endforeach

                </select>
            </div>
                    </div>
                    
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                <a href= "{{route('backend.categories.index')}}" type="button" class="btn btn-outline-secondary">Hủy</a>
                <button style="float:right;" type="submit" class="btn btn-success">Lưu</button>
                </div>
              </form>
            </div>
        </div>
        
      </div><!-- /.container-fluid -->
@endsection
@section('script')
push('stack_scripts')
<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>
@endsection 
