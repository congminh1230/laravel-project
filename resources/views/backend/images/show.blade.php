@extends('backend.layouts.master')
@section('content-header')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Sản phẩm</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
              <li class="breadcrumb-item active">Danh sách </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content')
<div class="container">
        <form action="{{ route('backend.images.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Tiêu đề</label>
                <input type="text" name="name" class="form-control" id="" value="{{ old('title') }}"
                class="@error('title') is-invalid @enderror" placeholder="" name="title">
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>
            <div class="form-group">
                    <label for="exampleInputFile">Thêm ảnh 1</label>
                    <div class="input-group">
                        <div class="form-group col-6">
                          <label for="exampleInputPassword1">Ảnh</label>
                        <input multiple class="form-control" type="file" name="products[]">
                        
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text">Tải lên</span>
                        </div>
                    </div>
              </div>
              <!-- <div class="form-group">
                    <label for="exampleInputFile">Thêm ảnh 2</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="product" multiple>
                            <label class="custom-file-label" for="exampleInputFile">Chọn file</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text">Tải lên</span>
                        </div>
                    </div>
              </div> -->
            <div class="form-group">
                <label for="">Sản Phẩm</label>
                <select class="form-control" name="category_name">
                    <option value="0">
                        Chọn danh mục
                    </option>
                    @foreach ($products as $product)
                        <option value="{{ $product->name }}">{{ $product->name }}</option>
                    @endforeach

                </select>
            </div>
           
            <a href="{{ route('backend.products.add') }}" class="btn btn-danger">Hủy</a>
            <button style="margin-left:85%" type="submit" class="btn btn-primary">Tạo mới</button>
        </form>
    </div>
@endsection
