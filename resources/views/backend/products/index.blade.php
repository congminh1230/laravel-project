@section('link')
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
@endsection
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
        <div class="col-12">
          <form style="margin: 20px 0 ; display:flex; justify-content:space-evenly " method="GET" action="" class="form-inline"  >
            <div class="col-3">
              <input value="{{ request()->get('title')}}" name="title" type="text" class="form-control" placeholder="Nhập tiêu đề cần tìm..">
            </div>
            <div class="col-3">
              <input value="{{ request()->get('status')}}" name="status" type="text" class="form-control" placeholder="Trạng thái....">
            </div>

            <div style="margin-right: 30px">
                <button type="submit" class="btn btn-info">Lọc</button>
              </div>
            {{-- <div >
                <a href="" class="btn btn-default"> Quay lại</a>
            </div> --}}
          </form>
        </div>
        <table class="table table-striped projects">
                <a href="{{ route('backend.products.create') }}" class="btn btn-success" style="margin-bottom:10px" ><i style="margin-right:10px" class="fas fa-plus"></i>Tạo bài viết</a>
              <thead>
                      <tr>
                        <th>STT</th>
                        <th>Tiêu đề</th>
                        <th>Ảnh</th>
                        <th>Danh mục</th>
                        <th>Tags</th>
                        <th>Trạng thái</th>
                        {{-- <th>Lượt xem</th> --}}
                        <th>Thời gian tạo</th>
                        <th>Ngày cập nhật</th>
                        <th class="text-center">Hoạt động</th>
                      </tr>
              </thead>
              <tbody>
                @foreach($products as $product)
                    <tr>
                       
                        <td>{{ $product->id }}</td>
                        <td  style="width: 20%" > 
                            {{ $product->name }}
                            <a href="">{{ $product->slug }}</a>
                           
                        </td>
                        <td>
                                <img src="@if(!empty($product->image))
                                      {{$product->image->path}}
                                      @endif" style="width:100px" >
                        </td>
                        <td class="text-center">
                            <span class="badge badge -info">{{ $product->category->name }}</span>
                        </td>
                       
                        <td>  </td>
                        <td>  {{ $product->status }} </td>
                        <td>  {!! date('d/m/Y', strtotime($product->created_at)) !!}</td>
                        <td>  {!! date('d/m/Y', strtotime($product->updated_at)) !!}</td>
                        <td>
                            <a style="margin-right:10px;" href="{{ route('backend.products.edit',['product' => $product->id ]) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                            <form method="POST" action="{{ route('backend.products.destroy',['product' => $product->id ]) }}">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                              </button>
                            </form>
                        </td>
                    </tr>
                 @endforeach
              </tbody>
        </table>
        {{ $products->links() }}
@endsection
@section('script')
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}
@endsection

