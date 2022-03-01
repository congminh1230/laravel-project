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
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                Summernote
              </h3>
            </div>

            <!-- /.card-header -->
            <from>
              <div style="padding:0 20px" >
                <input style="width:100%;" type="text" class="" placeholder="Tiêu đề" />
              </div>
              <div class="card-body">
                <textarea id="summernote" name="summernote" >
                </textarea>
              </div>
            </from>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    
       
        <!-- /.col-->
      <!-- ./row -->
    </section>
@endsection
@section('script')
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