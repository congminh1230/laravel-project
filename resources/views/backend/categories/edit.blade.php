@extends('backend.layouts.master')
@section('content-header')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tạo mới bài viết</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tạo mới bài viết</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content')
<div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        <div class="card card-primary col-12">
              <!-- /.card-header -->
              <!-- form start -->
              <form class="" method="POST" action="{{route('backend.categories.update', [ 'category' => $category->id ])}}">
                @csrf
                @method('PUT')
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tiêu đề</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{  $category->name }}" placeholder="Enter...">
                  </div>
                  <div class="form-group">
                    <select class="form-control" name="category_parent">
                      <option value="">
                          Chọn danh mục
                      </option>
                      @foreach ($categories as $category)
                          <option >{{ $category->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class= "row">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                <a href= "list" type="button" class="btn btn-outline-secondary">Hủy</a>
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
