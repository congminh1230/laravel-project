@extends('backend.layouts.master')
@section('content-header')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tạo Mới Logo</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Logo</a></li>
              <li class="breadcrumb-item active">Tạo Mới Logo</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content')
<div class="container">
        <form action="{{ route('backend.logo.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Tên Logo</label>
                <input type="text" class="form-control" id="" value="{{ old('title') }}"
                class="@error('title') is-invalid @enderror" placeholder="" name="name">
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Tải lên ảnh</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="logo"  multiple >
                            <label class="custom-file-label" for="exampleInputFile">Chọn file</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text">Tải lên</span>
                        </div>
                    </div>
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