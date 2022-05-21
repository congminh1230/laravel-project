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
<div class="container">
        <form action="{{ route('backend.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Tiêu đề</label>
                <input type="text" class="form-control" id="" value="{{ old('title') }}"
                class="@error('title') is-invalid @enderror" placeholder="" name="title">
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>
            <!-- <div class="form-group">
                <label for="">Ảnh</label>
                <input type="file" class="form-control" id="image_url" name="image_url">
            </div> -->
            <div class="form-group">
                    <label for="exampleInputEmail1">Text area</label>
                    <textarea class="col-12" name="content" id="text_area" cols="30" rows="10"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Tải lên ảnh</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image"  multiple >
                            <label class="custom-file-label" for="exampleInputFile">Chọn file</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text">Tải lên</span>
                        </div>
                    </div>
                  </div>
            <div class="form-group">
                <label for="">Danh mục</label>
                <select class="form-control" name="category_name">
                    <option value="0">
                        Chọn danh mục
                    </option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->name }}">{{ $category->name }}</option>
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
            <a href="{{ route('backend.posts.index') }}" class="btn btn-danger">Hủy</a>
            <button style="margin-left:85%" type="submit" class="btn btn-primary">Tạo mới</button>
        </form>
    </div>
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