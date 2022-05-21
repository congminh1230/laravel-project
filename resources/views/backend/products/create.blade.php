@extends('backend.layouts.master')
@section('content-header')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tạo mới bài sản phẩm</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Sản Phẩm</a></li>
              <li class="breadcrumb-item active">Tạo mới sản phẩm</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content')
<div class="container">
        <form action="{{ route('backend.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Tên Sản Phẩm</label>
                <input type="text" class="form-control" 
                name="name">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>
            <div class="form-group">
                    <label for="exampleInputEmail1">Miêu Tả Sản Phẩm</label>
                    <input type="text"  class="form-control" class="@error('description') is-invalid @enderror" value="{{ old('description') }}" name="description">
                    @error('description')
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
            <div class="form-group">
                    <label for="exampleInputEmail1">Số Lượng Sản Phẩm</label>
                    <input type="text" class="@error('quantity') is-invalid @enderror" value="{{ old('quantity') }}" class="form-control" name="quantity">
                    @error('quantity')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
            </div>
            <div class="form-group">
                    <label for="exampleInputEmail1">Giá(VND)</label>
                    <input type="text" class="@error('price_origin') is-invalid @enderror" value="{{ old('price_origin') }}" class="form-control" name="price_origin">
                    @error('price_origin')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
            </div>
            <div class="form-group">
                    <label for="exampleInputEmail1">Giá Sale(VND)</label>
                    <input type="text" class="form-control" name="price_sale">
            </div>
            <div class="form-group">
                    <label for="exampleInputEmail1">Trạng Thái</label>
                    <select class="form-control" name="status">
                      <option value="0">
                          Còn Hàng
                      </option>
                      <option value="1">
                          Hết Hàng
                      </option>
                      <option value="2">
                          Ngưng Bán
                      </option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Danh mục</label>
                <select class="form-control" name="category_name">
                    <option value="0">
                        Chọn danh mục
                    </option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach

                </select>
            </div>
            <a href="{{ route('backend.products.index') }}" class="btn btn-danger">Hủy</a>
            <button style="margin-left:85%" type="submit" class="btn btn-primary">Tạo mới</button>
        </form>
    </div>
@endsection
