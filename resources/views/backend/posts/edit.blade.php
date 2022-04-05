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
              <form class="" method="POST" action="{{route('backend.posts.update', [ 'post' => $post->id ])}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tiêu đề</label>
                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" value="{{  $post->title }}" placeholder="Enter...">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Tải lên ảnh</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image">
                            <label class="custom-file-label" for="exampleInputFile">Chọn file</label>
                        </div>
                        <div class="input-group-append">
                        <span class="input-group-text">Tải lên</span>
                    </div>
                </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Text area</label>
                    <textarea  id="summernote"class="col-12" name="content" id="text_area" cols="30" rows="10">
                              {{  $post->content }}
                    </textarea>
                  </div>
                  <div class="form-group">
                <label for="">Danh mục</label>
                <select class="form-control" name="category_id">
                    <option value="0">
                        Chọn danh mục
                    </option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach

                </select>
            </div>
            <div class="form-group">
                <label>Tags</label>
                <select multiple="" name="tags[]" class="form-control">
                    <option value="0">
                        Chọn Tags
                    </option>
                    @foreach ($tags as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
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
