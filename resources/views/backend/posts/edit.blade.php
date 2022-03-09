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
              <form class="" method="POST" action="{{route('backend.posts.update', [ 'post' => $posts->id ])}}">
                @csrf
                @method('PUT')
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tiêu đề</label>
                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" value="{{  $posts->title }}" placeholder="Enter...">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Text area</label>
                    <textarea  id="summernote"class="col-12" name="content" id="text_area" cols="30" rows="10">
                              {{  $posts->content }}
                    </textarea>
                  </div>
                  <div class= "row">
                    <div class="form-group col-6">
                      <label for="exampleInputPassword1">Danh mục</label>
                      <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                      <option selected="selected" data-select2-id="3">Option1</option>
                      <option data-select2-id="36">Option2</option>
                      <option data-select2-id="37">Option3</option>
                      <option data-select2-id="38">Option4</option>
                      <option data-select2-id="39">Option5</option>
                      <option data-select2-id="40">Option6</option>
                      <option data-select2-id="41">Option7</option>
                      </select>
                    </div>
                    <div class="form-group col-6">
                      <label for="exampleInputPassword1">Trạng thái</label>
                      <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                      <option selected="selected" data-select2-id="3">Option1</option>
                      <option data-select2-id="36">Option2</option>
                      <option data-select2-id="37">Option3</option>
                      <option data-select2-id="38">Option4</option>
                      <option data-select2-id="39">Option5</option>
                      <option data-select2-id="40">Option6</option>
                      <option data-select2-id="41">Option7</option>
                      </select>
                    </div>
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
